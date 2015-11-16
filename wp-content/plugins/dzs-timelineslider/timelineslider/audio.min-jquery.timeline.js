


//SHARED VARIABLE TO INTERACT WITH VIDEO & PRETTYPHOTO
var audio;


// A cross-browser javascript shim for html5 audio
(function(audiojs, audiojsInstance, container) {
    // Use the path to the audio.js file to create relative paths to the swf and player graphics
    // Remember that some systems (e.g. ruby on rails) append strings like '?1301478336' to asset paths
    var path = (function() {
        var re = new RegExp('audio(\.min-jquery.timeline)?\.js.*'),
            scripts = document.getElementsByTagName('script');
        for (var i = 0, ii = scripts.length; i < ii; i++) {
            var path = scripts[i].getAttribute('src');
            if(re.test(path)) return path.replace(re, '');
        }
    })();

    // ##The audiojs interface
    // This is the global object which provides an interface for creating new `audiojs` instances.
    // It also stores all of the construction helper methods and variables.
    container[audiojs] = {
        instanceCount: 0,
        instances: {},
        // The markup for the swf. It is injected into the page if there is not support for the `<audio>` element. The `$n`s are placeholders.
        // `$1` The name of the flash movie
        // `$2` The path to the swf
        // `$3` Cache invalidation
        flashSource: '\
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="$1" width="1" height="1" name="$1" style="position: absolute; left: -2000px;"> \
<param name="movie" value="$2?playerInstance='+audiojs+'.instances[\'$1\']&datetime=$3"> \
<param name="allowscriptaccess" value="always"> \
<embed name="$1" src="$2?playerInstance='+audiojs+'.instances[\'$1\']&datetime=$3" width="1" height="1" allowscriptaccess="always"> \
</object>',

        // ### The main settings object
        // Where all the default settings are stored. Each of these variables and methods can be overwritten by the user-provided `options` object.
        settings: {
            autoplay: false,
            loop: false,
            preload: true,
            imageLocation: path + 'audio_player.png',
            swfLocation: path + 'audiojs.swf',
            useFlash: (function() {
                var a = document.createElement('audio');
                return !(a.canPlayType && a.canPlayType('audio/mpeg;').replace(/no/, ''));
            })(),
            hasFlash: (function() {
                if (navigator.plugins && navigator.plugins.length && navigator.plugins['Shockwave Flash']) {
                    return true;
                } else if (navigator.mimeTypes && navigator.mimeTypes.length) {
                    var mimeType = navigator.mimeTypes['application/x-shockwave-flash'];
                    return mimeType && mimeType.enabledPlugin;
                } else {
                    try {
                        var ax = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
                        return true;
                    } catch (e) {}
                }
                return false;
            })(),
            // The default markup and classes for creating the player:
            createPlayer: {
                markup: '\
<div class="play-pause"> \
<p class="play"></p> \
<p class="pause"></p> \
<p class="loading"></p> \
<p class="error"></p> \
</div> \
<div class="scrubber"> \
<div class="progress"></div> \
<div class="loaded"></div> \
</div> \
<div class="time"> \
<em class="played">00:00</em>/<strong class="duration">00:00</strong> \
</div> \
<div class="error-message"></div>',
                playPauseClass: 'play-pause',
                scrubberClass: 'scrubber',
                progressClass: 'progress',
                loaderClass: 'loaded',
                timeClass: 'time',
                durationClass: 'duration',
                playedClass: 'played',
                errorMessageClass: 'error-message',
                playingClass: 'playing',
                loadingClass: 'loading',
                errorClass: 'error'
            },
            // The css used by the default player. This is is dynamically injected into a `<style>` tag in the top of the head.
            css: '\
.audiojs audio { position: absolute; left: -1px; } \
.audiojs { width: 30px; height: 36px; overflow: hidden; font-family: tahoma; font-size: 12px; } \
.audiojs .play-pause { width: 25px; height: 40px; padding: 4px 6px; margin: 0px; float: left; overflow: hidden; border-right: 1px solid #000; } \
.audiojs p { display: none; width: 25px; height: 40px; margin: 0px; cursor: pointer; } \
.audiojs .play { display: block; } \
.audiojs .scrubber { display:none; position: relative; float: left; width: 280px; background: #5a5a5a; height: 14px; margin: 10px; border-top: 1px solid #3f3f3f; border-left: 0px; border-bottom: 0px; overflow: hidden; } \
.audiojs .progress { display:none; position: absolute; top: 0px; left: 0px; height: 14px; width: 0px; background: #ccc; z-index: 1; \
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #ccc), color-stop(0.5, #ddd), color-stop(0.51, #ccc), color-stop(1, #ccc)); \
background-image: -moz-linear-gradient(center top, #ccc 0%, #ddd 50%, #ccc 51%, #ccc 100%); } \
.audiojs .loaded { display:none; position: absolute; top: 0px; left: 0px; height: 14px; width: 0px; background: #000; \
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #222), color-stop(0.5, #333), color-stop(0.51, #222), color-stop(1, #222)); \
background-image: -moz-linear-gradient(center top, #222 0%, #333 50%, #222 51%, #222 100%); } \
.audiojs .time { display:none; float: left; height: 36px; line-height: 36px; margin: 0px 0px 0px 6px; padding: 0px 6px 0px 12px; border-left: 1px solid #000; color: #ddd; text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.5); } \
.audiojs .time em { padding: 0px 2px 0px 0px; color: #f9f9f9; font-style: normal; } \
.audiojs .time strong { padding: 0px 0px 0px 2px; font-weight: normal; } \
.audiojs .error-message { display:none; float: left; display: none; margin: 0px 10px; height: 36px; width: 400px; overflow: hidden; line-height: 36px; white-space: nowrap; color: #fff; \
text-overflow: ellipsis; -o-text-overflow: ellipsis; -icab-text-overflow: ellipsis; -khtml-text-overflow: ellipsis; -moz-text-overflow: ellipsis; -webkit-text-overflow: ellipsis; } \
.audiojs .error-message a { color: #eee; text-decoration: none; padding-bottom: 1px; border-bottom: 1px solid #999; white-space: wrap; } \
\
.audiojs .play { background: url("$1") -2px -1px no-repeat; } \
.audiojs .loading { background: url("$1") -2px -31px no-repeat; } \
.audiojs .error { background: url("$1") -2px -61px no-repeat; } \
.audiojs .pause { background: url("$1") -2px -92px no-repeat; } \
\
.playing .play, .playing .loading, .playing .error { display: none; } \
.playing .pause { display: block; } \
\
.loading .play, .loading .pause, .loading .error { display: none; } \
.loading .loading { display: block; } \
\
.error .time, .error .play, .error .pause, .error .scrubber, .error .loading { display: none; } \
.error .error { display: block; } \
.error .play-pause p { cursor: auto; } \
.error .error-message { display: block; }',
            // The default event callbacks:
            trackEnded: function(e) {},
            flashError: function() {
                var player = this.settings.createPlayer,
                    errorMessage = getByClass(player.errorMessageClass, this.wrapper),
                    html = 'Missing <a href="http://get.adobe.com/flashplayer/">flash player</a> plugin.';
                if (this.mp3) html += ' <a href="'+this.mp3+'">Download audio file</a>.';
                container[audiojs].helpers.removeClass(this.wrapper, player.loadingClass);
                container[audiojs].helpers.addClass(this.wrapper, player.errorClass);
                errorMessage.innerHTML = html;
            },
            loadError: function(e) {
                var player = this.settings.createPlayer,
                    errorMessage = getByClass(player.errorMessageClass, this.wrapper);
                container[audiojs].helpers.removeClass(this.wrapper, player.loadingClass);
                container[audiojs].helpers.addClass(this.wrapper, player.errorClass);
                errorMessage.innerHTML = 'Error loading: "'+this.mp3+'"';
            },
            init: function() {
                var player = this.settings.createPlayer;
                container[audiojs].helpers.addClass(this.wrapper, player.loadingClass);
            },
            loadStarted: function() {
                var player = this.settings.createPlayer,
                    duration = getByClass(player.durationClass, this.wrapper),
                    m = Math.floor(this.duration / 60),
                    s = Math.floor(this.duration % 60);
                container[audiojs].helpers.removeClass(this.wrapper, player.loadingClass);
                duration.innerHTML = ((m<10?'0':'')+m+':'+(s<10?'0':'')+s);
            },
            loadProgress: function(percent) {
                var player = this.settings.createPlayer,
                    scrubber = getByClass(player.scrubberClass, this.wrapper),
                    loaded = getByClass(player.loaderClass, this.wrapper);
                loaded.style.width = (scrubber.offsetWidth * percent) + 'px';
            },
            playPause: function() {
                if (this.playing) this.settings.play();
                else this.settings.pause();
            },
            play: function() {
                var player = this.settings.createPlayer;
                container[audiojs].helpers.addClass(this.wrapper, player.playingClass);
            },
            pause: function() {
                var player = this.settings.createPlayer;
                container[audiojs].helpers.removeClass(this.wrapper, player.playingClass);
            },
            updatePlayhead: function(percent) {
                var player = this.settings.createPlayer,
                    scrubber = getByClass(player.scrubberClass, this.wrapper),
                    progress = getByClass(player.progressClass, this.wrapper);
                progress.style.width = (scrubber.offsetWidth * percent) + 'px';

                var played = getByClass(player.playedClass, this.wrapper),
                    p = this.duration * percent,
                    m = Math.floor(p / 60),
                    s = Math.floor(p % 60);
                played.innerHTML = ((m<10?'0':'')+m+':'+(s<10?'0':'')+s);
            }
        },

        // ### Contructor functions

        // `create()`
        // Used to create a single `audiojs` instance.
        // If an array is passed then it calls back to `createAll()`.
        // Otherwise, it creates a single instance and returns it.
        create: function(element, options) {
            var options = options || {}
            if (element.length) {
                return this.createAll(options, element);
            } else {
                return this.newInstance(element, options);
            }
        },

        // `createAll()`
        // Creates multiple `audiojs` instances.
        // If `elements` is `null`, then automatically find any `<audio>` tags on the page and create `audiojs` instances for them.
        createAll: function(options, elements) {
            var audioElements = elements || document.getElementsByTagName('audio'),
                instances = []
            options = options || {};
            for (var i = 0, ii = audioElements.length; i < ii; i++) {
                instances.push(this.newInstance(audioElements[i], options));
            }
            return instances;
        },

        // ### Creating and returning a new instance
        // This goes through all the steps required to build out a usable `audiojs` instance.
        newInstance: function(element, options) {
            var element = element,
                s = this.helpers.clone(this.settings),
                id = 'audiojs'+this.instanceCount,
                wrapperId = 'audiojs_wrapper'+this.instanceCount,
                instanceCount = this.instanceCount++;

            // Check for `autoplay`, `loop` and `preload` attributes and write them into the settings.
            if (element.getAttribute('autoplay') != null) s.autoplay = true;
            if (element.getAttribute('loop') != null) s.loop = true;
            if (element.getAttribute('preload') == 'none') s.preload = false;
            // Merge the default settings with the user-defined `options`.
            if (options) this.helpers.merge(s, options);

            // Inject the player html if required.
            if (s.createPlayer.markup) element = this.createPlayer(element, s.createPlayer, wrapperId);
            else element.parentNode.setAttribute('id', wrapperId);

            // Return a new `audiojs` instance.
            audio = new container[audiojsInstance](element, s);

            // If css has been passed in, dynamically inject it into the `<head>`.
            if (s.css) this.helpers.injectCss(audio, s.css);

            // If `<audio>` or mp3 playback isn't supported, insert the swf & attach the required events for it.
            if (s.useFlash && s.hasFlash) {
                this.injectFlash(audio, id);
                this.attachFlashEvents(audio.wrapper, audio);
            } else if (s.useFlash && !s.hasFlash) {
                this.settings.flashError.apply(audio);
            }

            // Attach event callbacks to the new audiojs instance.
            if (!s.useFlash || (s.useFlash && s.hasFlash)) this.attachEvents(audio.wrapper, audio);

            // Store the newly-created `audiojs` instance.
            this.instances[id] = audio;
            return audio;
        },

        // ### Helper methods for constructing a working player
        // Inject a wrapping div and the markup for the html player.
        createPlayer: function(element, player, id) {
            var wrapper = document.createElement('div'),
                newElement = element.cloneNode(true);
            wrapper.setAttribute('class', 'audiojs');
            wrapper.setAttribute('className', 'audiojs');
            wrapper.setAttribute('id', id);

            // Fix IE's broken implementation of `innerHTML` & `cloneNode` for HTML5 elements.
            if (newElement.outerHTML && !document.createElement('audio').canPlayType) {
                newElement = this.helpers.cloneHtml5Node(element);
                wrapper.innerHTML = player.markup;
                wrapper.appendChild(newElement);
                element.outerHTML = wrapper.outerHTML;
                wrapper = document.getElementById(id);
            } else {
                wrapper.appendChild(newElement);
                wrapper.innerHTML = wrapper.innerHTML + player.markup;
                element.parentNode.replaceChild(wrapper, element);
            }
            return wrapper.getElementsByTagName('audio')[0];
        },

        // Attaches useful event callbacks to an `audiojs` instance.
        attachEvents: function(wrapper, audio) {
            if (!audio.settings.createPlayer) return;
            var player = audio.settings.createPlayer,
                playPause = getByClass(player.playPauseClass, wrapper),
                scrubber = getByClass(player.scrubberClass, wrapper),
                leftPos = function(elem) {
                    var curleft = 0;
                    if (elem.offsetParent) {
                        do { curleft += elem.offsetLeft; } while (elem = elem.offsetParent);
                    }
                    return curleft;
                };

            container[audiojs].events.addListener(playPause, 'click', function(e) {
                audio.playPause.apply(audio);
            });

            container[audiojs].events.addListener(scrubber, 'click', function(e) {
                var relativeLeft = e.clientX - leftPos(this);
                audio.skipTo(relativeLeft / scrubber.offsetWidth);
            });

            // _If flash is being used, then the following handlers don't need to be registered._
            if (audio.settings.useFlash) return;

            // Start tracking the load progress of the track.
            container[audiojs].events.trackLoadProgress(audio);

            container[audiojs].events.addListener(audio.element, 'timeupdate', function(e) {
                audio.updatePlayhead.apply(audio);
            });

            container[audiojs].events.addListener(audio.element, 'ended', function(e) {
                audio.trackEnded.apply(audio);
            });

            container[audiojs].events.addListener(audio.source, 'error', function(e) {
                // on error, cancel any load timers that are running.
                clearInterval(audio.readyTimer);
                clearInterval(audio.loadTimer);
                audio.settings.loadError.apply(audio);
            });

        },

        // Flash requires a slightly different API to the `<audio>` element, so this method is used to overwrite the standard event handlers.
        attachFlashEvents: function(element, audio) {
            audio['swfReady'] = false;
            audio['load'] = function(mp3) {
                // If the swf isn't ready yet then just set `audio.mp3`. `init()` will load it in once the swf is ready.
                audio.mp3 = mp3;
                if (audio.swfReady) audio.element.load(mp3);
            }
            audio['loadProgress'] = function(percent, duration) {
                audio.loadedPercent = percent;
                audio.duration = duration;
                audio.settings.loadStarted.apply(audio);
                audio.settings.loadProgress.apply(audio, [percent]);
            }
            audio['skipTo'] = function(percent) {
                if (percent > audio.loadedPercent) return;
                audio.updatePlayhead.call(audio, [percent])
                audio.element.skipTo(percent);
            }
            audio['updatePlayhead'] = function(percent) {
                audio.settings.updatePlayhead.apply(audio, [percent]);
            }
            audio['play'] = function() {
                // If the audio hasn't started preloading, then start it now.
                // Then set `preload` to `true`, so that any tracks loaded in subsequently are loaded straight away.
                if (!audio.settings.preload) {
                    audio.settings.preload = true;
                    audio.element.init(audio.mp3);
                }
                audio.playing = true;
                // IE doesn't allow a method named `play()` to be exposed through `ExternalInterface`, so lets go with `pplay()`.
                // <http://dev.nuclearrooster.com/2008/07/27/externalinterfaceaddcallback-can-cause-ie-js-errors-with-certain-keyworkds/>
                audio.element.pplay();
                audio.settings.play.apply(audio);
            }
            audio['pause'] = function() {
                audio.playing = false;
                // Use `ppause()` for consistency with `pplay()`, even though it isn't really required.
                audio.element.ppause();
                audio.settings.pause.apply(audio);
            }
            audio['setVolume'] = function(v) {
                audio.element.setVolume(v);
            }
            audio['loadStarted'] = function() {
                // Load the mp3 specified by the audio element into the swf.
                audio.swfReady = true;
                if (audio.settings.preload) audio.element.init(audio.mp3);
                if (audio.settings.autoplay) audio.play.apply(audio);
            }
        },

        // ### Injecting an swf from a string
        // Build up the swf source by replacing the `$keys` and then inject the markup into the page.
        injectFlash: function(audio, id) {
            var flashSource = this.flashSource.replace(/\$1/g, id);
            flashSource = flashSource.replace(/\$2/g, audio.settings.swfLocation);
            // `(+new Date)` ensures the swf is not pulled out of cache. The fixes an issue with Firefox running multiple players on the same page.
            flashSource = flashSource.replace(/\$3/g, (+new Date + Math.random()));
            // Inject the player markup using a more verbose `innerHTML` insertion technique that works with IE.
            var html = audio.wrapper.innerHTML,
                div = document.createElement('div');
            div.innerHTML = flashSource + html;
            audio.wrapper.innerHTML = div.innerHTML;
            audio.element = this.helpers.getSwf(id);
        },

        // ## Helper functions
        helpers: {
            // **Merge two objects, with `obj2` overwriting `obj1`**
            // The merge is shallow, but that's all that is required for our purposes.
            merge: function(obj1, obj2) {
                for (attr in obj2) {
                    if (obj1.hasOwnProperty(attr) || obj2.hasOwnProperty(attr)) {
                        obj1[attr] = obj2[attr];
                    }
                }
            },
            // **Clone a javascript object (recursively)**
            clone: function(obj){
                if (obj == null || typeof(obj) !== 'object') return obj;
                var temp = new obj.constructor();
                for (var key in obj) temp[key] = arguments.callee(obj[key]);
                return temp;
            },
            // **Adding/removing classnames from elements**
            addClass: function(element, className) {
                var re = new RegExp('(\\s|^)'+className+'(\\s|$)');
                if (re.test(element.className)) return;
                element.className += ' ' + className;
            },
            removeClass: function(element, className) {
                var re = new RegExp('(\\s|^)'+className+'(\\s|$)');
                element.className = element.className.replace(re,' ');
            },
            // **Dynamic CSS injection**
            // Takes a string of css, inserts it into a `<style>`, then injects it in at the very top of the `<head>`. This ensures any user-defined styles will take precedence.
            injectCss: function(audio, string) {

                // If an `audiojs` `<style>` tag already exists, then append to it rather than creating a whole new `<style>`.
                var prepend = '',
                    styles = document.getElementsByTagName('style'),
                    css = string.replace(/\$1/g, audio.settings.imageLocation);

                for (var i = 0, ii = styles.length; i < ii; i++) {
                    var title = styles[i].getAttribute('title');
                    if (title && ~title.indexOf('audiojs')) {
                        style = styles[i];
                        if (style.innerHTML === css) return;
                        prepend = style.innerHTML;
                        break;
                    }
                };

                var head = document.getElementsByTagName('head')[0],
                    firstchild = head.firstChild,
                    style = document.createElement('style');

                if (!head) return;

                style.setAttribute('type', 'text/css');
                style.setAttribute('title', 'audiojs');

                if (style.styleSheet) style.styleSheet.cssText = prepend + css;
                else style.appendChild(document.createTextNode(prepend + css));

                if (firstchild) head.insertBefore(style, firstchild);
                else head.appendChild(styleElement);
            },
            // **Handle all the IE6+7 requirements for cloning `<audio>` nodes**
            // Create a html5-safe document fragment by injecting an `<audio>` element into the document fragment.
            cloneHtml5Node: function(audioTag) {
                var fragment = document.createDocumentFragment(),
                    doc = fragment.createElement ? fragment : document;
                doc.createElement('audio');
                var div = doc.createElement('div');
                fragment.appendChild(div);
                div.innerHTML = audioTag.outerHTML;
                return div.firstChild;
            },
            // **Cross-browser `<object>` / `<embed>` element selection**
            getSwf: function(name) {
                var swf = document[name] || window[name];
                return swf.length > 1 ? swf[swf.length - 1] : swf;
            }
        },
        // ## Event-handling
        events: {
            memoryLeaking: false,
            listeners: [],
            // **A simple cross-browser event handler abstraction**
            addListener: function(element, eventName, func) {
                // For modern browsers use the standard DOM-compliant `addEventListener`.
                if (element.addEventListener) {
                    element.addEventListener(eventName, func, false);
                    // For older versions of Internet Explorer, use `attachEvent`.
                    // Also provide a fix for scoping `this` to the calling element and register each listener so the containing elements can be purged on page unload.
                } else if (element.attachEvent) {
                    this.listeners.push(element);
                    if (!this.memoryLeaking) {
                        window.attachEvent('onunload', function() {
                            if(this.listeners) {
                                for (var i = 0, ii = this.listeners.length; i < ii; i++) {
                                    container[audiojs].events.purge(this.listeners[i]);
                                }
                            }
                        });
                        this.memoryLeaking = true;
                    }
                    element.attachEvent('on' + eventName, function() {
                        func.call(element, window.event);
                    });
                }
            },

            trackLoadProgress: function(audio) {
                // If `preload` has been set to `none`, then we don't want to start loading the track yet.
                if (!audio.settings.preload) return;

                var readyTimer,
                    loadTimer,
                    audio = audio,
                    ios = (/(ipod|iphone|ipad)/i).test(navigator.userAgent);

                // Use timers here rather than the official `progress` event, as Chrome has issues calling `progress` when loading mp3 files from cache.
                readyTimer = setInterval(function() {
                    if (audio.element.readyState > -1) {
                        // iOS doesn't start preloading the mp3 until the user interacts manually, so this stops the loader being displayed prematurely.
                        if (!ios) audio.init.apply(audio);
                    }
                    if (audio.element.readyState > 1) {
                        if (audio.settings.autoplay) audio.play.apply(audio);
                        clearInterval(readyTimer);
                        // Once we have data, start tracking the load progress.
                        loadTimer = setInterval(function() {
                            audio.loadProgress.apply(audio);
                            if (audio.loadedPercent >= 1) clearInterval(loadTimer);
                        });
                    }
                }, 10);
                audio.readyTimer = readyTimer;
                audio.loadTimer = loadTimer;
            },

            // **Douglas Crockford's IE6 memory leak fix**
            // <http://javascript.crockford.com/memory/leak.html>
            // This is used to release the memory leak created by the circular references created when fixing `this` scoping for IE. It is called on page unload.
            purge: function(d) {
                var a = d.attributes, i;
                if (a) {
                    for (i = 0; i < a.length; i += 1) {
                        if (typeof d[a[i].name] === 'function') d[a[i].name] = null;
                    }
                }
                a = d.childNodes;
                if (a) {
                    for (i = 0; i < a.length; i += 1) purge(d.childNodes[i]);
                }
            },

            // **DOMready function**
            // As seen here: <https://github.com/dperini/ContentLoaded/>.
            ready: (function() { return function(fn) {
                var win = window, done = false, top = true,
                    doc = win.document, root = doc.documentElement,
                    add = doc.addEventListener ? 'addEventListener' : 'attachEvent',
                    rem = doc.addEventListener ? 'removeEventListener' : 'detachEvent',
                    pre = doc.addEventListener ? '' : 'on',
                    init = function(e) {
                        if (e.type == 'readystatechange' && doc.readyState != 'complete') return;
                        (e.type == 'load' ? win : doc)[rem](pre + e.type, init, false);
                        if (!done && (done = true)) fn.call(win, e.type || e);
                    },
                    poll = function() {
                        try { root.doScroll('left'); } catch(e) { setTimeout(poll, 50); return; }
                        init('poll');
                    };
                if (doc.readyState == 'complete') fn.call(win, 'lazy');
                else {
                    if (doc.createEventObject && root.doScroll) {
                        try { top = !win.frameElement; } catch(e) { }
                        if (top) poll();
                    }
                    doc[add](pre + 'DOMContentLoaded', init, false);
                    doc[add](pre + 'readystatechange', init, false);
                    win[add](pre + 'load', init, false);
                }
            }
            })()

        }
    }

    // ## The audiojs class
    // We create one of these per `<audio>` and then push them into `audiojs['instances']`.
    container[audiojsInstance] = function(element, settings) {
        // Each audio instance returns an object which contains an API back into the `<audio>` element.
        this.element = element;
        this.wrapper = element.parentNode;
        this.source = element.getElementsByTagName('source')[0] || element;
        // First check the `<audio>` element directly for a src and if one is not found, look for a `<source>` element.
        this.mp3 = (function(element) {
            var source = element.getElementsByTagName('source')[0];
            return element.getAttribute('src') || (source ? source.getAttribute('src') : null);
        })(element);
        this.settings = settings;
        this.loadStartedCalled = false;
        this.loadedPercent = 0;
        this.duration = 1;
        this.playing = false;
    }

    container[audiojsInstance].prototype = {
        // API access events:
        // Each of these do what they need do and then call the matching methods defined in the settings object.
        updatePlayhead: function() {
            var percent = this.element.currentTime / this.duration;
            this.settings.updatePlayhead.apply(this, [percent]);
        },
        skipTo: function(percent) {
            if (percent > this.loadedPercent) return;
            this.element.currentTime = this.duration * percent;
            this.updatePlayhead();
        },
        load: function(mp3) {
            this.loadStartedCalled = false;
            this.source.setAttribute('src', mp3);
            // The now outdated `load()` method is required for Safari 4
            this.element.load();
            this.mp3 = mp3;
            container[audiojs].events.trackLoadProgress(this);
        },
        loadError: function() {
            this.settings.loadError.apply(this);
        },
        init: function() {
            this.settings.init.apply(this);
        },
        loadStarted: function() {
            // Wait until `element.duration` exists before setting up the audio player.
            if (!this.element.duration) return false;

            this.duration = this.element.duration;
            this.updatePlayhead();
            this.settings.loadStarted.apply(this);
        },
        loadProgress: function() {
            if (this.element.buffered != null && this.element.buffered.length) {
                // Ensure `loadStarted()` is only called once.
                if (!this.loadStartedCalled) {
                    this.loadStartedCalled = this.loadStarted();
                }
                var durationLoaded = this.element.buffered.end(this.element.buffered.length - 1);
                this.loadedPercent = durationLoaded / this.duration;

                this.settings.loadProgress.apply(this, [this.loadedPercent]);
            }
        },
        playPause: function() {
            if (this.playing) this.pause();
            else this.play();
        },
        play: function() {
            var ios = (/(ipod|iphone|ipad)/i).test(navigator.userAgent);
            // On iOS this interaction will trigger loading the mp3, so run `init()`.
            if (ios && this.element.readyState == 0) this.init.apply(this);
            // If the audio hasn't started preloading, then start it now.
            // Then set `preload` to `true`, so that any tracks loaded in subsequently are loaded straight away.
            if (!this.settings.preload) {
                this.settings.preload = true;
                this.element.setAttribute('preload', 'auto');
                container[audiojs].events.trackLoadProgress(this);
            }
            this.playing = true;
            this.element.play();
            this.settings.play.apply(this);
        },
        pause: function() {
            this.playing = false;
            this.element.pause();
            this.settings.pause.apply(this);
        },
        setVolume: function(v) {
            this.element.volume = v;
        },
        trackEnded: function(e) {
            this.skipTo.apply(this, [0]);
            if (!this.settings.loop) this.pause.apply(this);
            this.settings.trackEnded.apply(this);
        }
    }

    // **getElementsByClassName**
    // Having to rely on `getElementsByTagName` is pretty inflexible internally, so a modified version of Dustin Diaz's `getElementsByClassName` has been included.
    // This version cleans things up and prefers the native DOM method if it's available.
    var getByClass = function(searchClass, node) {
        var matches = [];
        node = node || document;

        if (node.getElementsByClassName) {
            matches = node.getElementsByClassName(searchClass);
        } else {
            var i, l,
                els = node.getElementsByTagName("*"),
                pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");

            for (i = 0, l = els.length; i < l; i++) {
                if (pattern.test(els[i].className)) {
                    matches.push(els[i]);
                }
            }
        }
        return matches.length > 1 ? matches : matches[0];
    };
// The global variable names are passed in here and can be changed if they conflict with anything else.
})('audiojs', 'audiojsInstance', this);





/*!
 * Tiny Scrollbar 1.66
 * http://www.baijs.nl/tinyscrollbar/
 *
 * Copyright 2010, Maarten Baijs
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.opensource.org/licenses/gpl-2.0.php
 *
 * Date: 13 / 11 / 2011
 * Depends on library: jQuery
 *
 *
 * Customized by pezflash - April 2012
 * Project: jQuery Timeline slider
 * http: //www.codecanyon.net/user/pezflash
 */


//SHARED VARS
var ratio;
var ratioDragger;
var iScroll;
var iScroll2;
var iPosition;


(function($){
    $.tiny = $.tiny || { };

    $.tiny.scrollbar = {
        options: {
            axis: 'x', // vertical or horizontal scrollbar? ( x || y ).
            wheel: 20,  //how many pixels must the mouswheel scroll at a time.
            mouseWheel: '1', //enable or disable the mousewheel;
            size: 'auto', //set the size of the scrollbar to auto or a fixed number.
            draggerWidth: 'auto' //set the size of the thumb to auto or a fixed number.
        }
    };

    $.fn.tinyscrollbar = function(options) {
        var options = $.extend({}, $.tiny.scrollbar.options, options);
        //console.log(options);
        this.each(function(){ $(this).data('tsb', new Scrollbar($(this), options)); });
        return this;
    };
    $.fn.tinyscrollbar_update = function(arg, sScroll) {
        //console.log($(this));
        return arg.data('tsb').update(sScroll);
    };

    function Scrollbar(root, options){
        var oSelf = this;
        var oWrapper = root;
        var oViewport = { obj: $('.viewport', root) };
        var oImages = { obj: $('.images', root) };
        var oMilestones = { obj: $('.milestones', root) };
        var oContent = { obj: $('.content', root) };
        var oScrollbar = { obj: $('.scrollbar', root) };
        var oScrollbar2 = { obj: $('.scrollbar', root) };
        var oTrack = { obj: $('.track', oScrollbar.obj) };
        var oDragger = { obj: $('.dragger', oScrollbar.obj) };
        var sAxis = options.axis == 'x', sDirection = sAxis ? 'left' : 'top', sSize = sAxis ? 'Width' : 'Height';
        iScroll, iScroll2, iPosition = { start: -30, now: -30 }, iMouse = {};

        function initialize() {
            oSelf.update();
            setEvents();
            return oSelf;
        }
        //console.log(this, jQuery(this));
        this.update = function(sScroll){
            oViewport[options.axis] = oViewport.obj[0]['offset'+ sSize];
            oMilestones[options.axis] = oMilestones.obj[0]['offset'+ sSize];
            oImages[options.axis] = oImages.obj[0]['scroll'+ sSize];
            oContent[options.axis] = oContent.obj[0]['scroll'+ sSize];
            oImages.ratio = oViewport[options.axis] / oImages[options.axis];
            oContent.ratio = oMilestones[options.axis] / oContent[options.axis];
            oScrollbar.obj.toggleClass('hidden', oImages.ratio >= 1);
            oScrollbar2.obj.toggleClass('hidden', oContent.ratio >= 1);
            oTrack[options.axis] = options.size == 'auto' ? oViewport[options.axis] : options.size;
            oDragger[options.axis] = Math.min(oTrack[options.axis], Math.max(0, ( options.draggerWidth == 'auto' ? (oTrack[options.axis] * oImages.ratio) : options.draggerWidth )));
            oScrollbar.ratio = options.draggerWidth == 'auto' ? (oImages[options.axis] / oTrack[options.axis]) : (oImages[options.axis] - oViewport[options.axis]) / (oTrack[options.axis] - oDragger[options.axis]);
            iScroll = (sScroll == 'relative' && oImages.ratio <= 1) ? Math.min((oImages[options.axis] - oViewport[options.axis]), Math.max(0, iScroll)) : 0;
            iScroll = (sScroll == 'bottom' && oImages.ratio <= 1) ? (oImages[options.axis] - oViewport[options.axis]) : isNaN(parseInt(sScroll)) ? iScroll : parseInt(sScroll);
            oScrollbar2.ratio = options.draggerWidth == 'auto' ? (oContent[options.axis] / oTrack[options.axis]) : (oContent[options.axis] - oMilestones[options.axis]) / (oTrack[options.axis] - oDragger[options.axis]);
            iScroll2 = (sScroll == 'relative' && oContent.ratio <= 1) ? Math.min((oContent[options.axis] - oMilestones[options.axis]), Math.max(0, iScroll2)) : 0;
            iScroll2 = (sScroll == 'bottom' && oContent.ratio <= 1) ? (oContent[options.axis] - oMilestones[options.axis]) : isNaN(parseInt(sScroll)) ? iScroll2 : parseInt(sScroll);
            ratio = oScrollbar2.ratio / oScrollbar.ratio;
            ratioDragger = (oTrack[options.axis] - oDragger[options.axis]) / (oImages[options.axis] - oTrack[options.axis]);
            setSize();
            moveStuff();
        };
        function setSize(){
            oDragger.obj.css(sDirection, iScroll / oScrollbar.ratio);
            oImages.obj.css(sDirection, -iScroll);
            oContent.obj.css(sDirection, -iScroll2);
            iMouse['start'] = oDragger.obj.offset()[sDirection];
            var sCssSize = sSize.toLowerCase();
            oScrollbar.obj.css(sCssSize, oTrack[options.axis]);
            oTrack.obj.css(sCssSize, oTrack[options.axis]);
            oDragger.obj.css(sCssSize, oDragger[options.axis]);
        };
        function setEvents(){
            oDragger.obj.bind('mousedown', start);
            oDragger.obj[0].ontouchstart = function(oEvent){
                oEvent.preventDefault();
                oDragger.obj.unbind('mousedown');
                start(oEvent.touches[0]);
                return false;
            };
            oTrack.obj.bind('mouseup', drag);
            if(options.mouseWheel == '1' && this.addEventListener){
                oWrapper[0].addEventListener('DOMMouseScroll', wheel, false);
                oWrapper[0].addEventListener('mousewheel', wheel, false );
            }
            else if(options.mouseWheel == '1'){oWrapper[0].onmousewheel = wheel;}
        };
        function start(oEvent){
            iMouse.start = sAxis ? oEvent.pageX : oEvent.pageY;
            var oDraggerDir = parseInt(oDragger.obj.css(sDirection));
            iPosition.start = oDraggerDir == 'auto' ? 0 : oDraggerDir;
            $(document).bind('mousemove', drag);
            document.ontouchmove = function(oEvent){
                $(document).unbind('mousemove');
                drag(oEvent.touches[0]);
            };
            $(document).bind('mouseup', end);
            oDragger.obj.bind('mouseup', end);
            oDragger.obj[0].ontouchend = document.ontouchend = function(oEvent){
                $(document).unbind('mouseup');
                oDragger.obj.unbind('mouseup');
                end(oEvent.touches[0]);
            };
            return false;
        };
        function wheel(oEvent){
            if(!(oImages.ratio >= 1)){
                var oEvent = oEvent || window.event;
                var iDelta = oEvent.wheelDelta ? oEvent.wheelDelta/120 : -oEvent.detail/3;
                iScroll -= iDelta * options.wheel * oScrollbar.ratio;
                iScroll = Math.min((oImages[options.axis] - oViewport[options.axis]), Math.max(0, iScroll));
                iScroll2 -= iDelta * options.wheel * oScrollbar2.ratio;
                iScroll2 = Math.min((oContent[options.axis] - oMilestones[options.axis]), Math.max(0, iScroll2));

                oDragger.obj.css(sDirection, iScroll / oScrollbar.ratio);
                oImages.obj.css(sDirection, -iScroll);
                oContent.obj.css(sDirection, -iScroll2);

                oEvent = $.event.fix(oEvent);
                oEvent.preventDefault();
            };
        };
        function end(oEvent){
            $(document).unbind('mousemove', drag);
            $(document).unbind('mouseup', end);
            oDragger.obj.unbind('mouseup', end);
            document.ontouchmove = oDragger.obj[0].ontouchend = document.ontouchend = null;
            return false;
        };
        function drag(oEvent){
            if(!(oImages.ratio >= 1)){
                iPosition.now = Math.min((oTrack[options.axis] - oDragger[options.axis]), Math.max(0, (iPosition.start + ((sAxis ? oEvent.pageX : oEvent.pageY) - iMouse.start))));
                iScroll = iPosition.now * oScrollbar.ratio;
                iScroll2 = iPosition.now * oScrollbar2.ratio;
                //console.log(iPosition.now);

                /*
                 $(oImages.obj).stop(true, true).animate({ left: -iScroll }, 1000, settings_easing.easeInOut);
                 $(oContent.obj).stop(true, true).animate({ left: -iScroll2 }, 700, settings_easing.easeInOut);
                 $(oDragger.obj).stop(true, true).animate({ left: iPosition.now }, 700, settings_easing.easeInOut);
                 */
                moveStuff();
                //DIRECT USE WITHOUT JQUERY ANIMATION
            }
            return false;
        };
        function moveStuff(){

            oImages.obj.css(sDirection, -iScroll);
            //oContent.obj.css(sDirection, -iScroll2);
            $(oContent.obj).animate({ left: -iScroll2 }, {duration:700, queue:false, easing:settings_easing.easeInOut});
            $(oDragger.obj).animate({ left: iPosition.now }, {duration:700, queue:false, easing:settings_easing.easeInOut});
        };

        return initialize();
    };
})(jQuery);








/*
 -------------------------------------------------------------
 Cascade Style Sheet - jQuery Timeline slider
 Description: jQuery Plugin for building web timelines
 Author: pezflash - http: //www.codecanyon.net/user/pezflash
 Version: 1.0
 -------------------------------------------------------------
 */

var settings_easing = {
    easeOut: 'easeOutQuad'
    ,easeInOut: 'easeInOutQuad'
};
if(window.jQuery && jQuery.easing["jswing"]){
}else{

    settings_easing.easeOut = 'swing';
    settings_easing.easeInOut = 'swing';
}

(function($) {
    // CLASS CONSTRUCTOR / INIT FUNCTION
    $.fn.myTimeline = function(o){
        var defaults ={
            totalImagesWidth : "0"
            ,totalImagesHeight : "0"
            ,totalContentWidth : "0"
            ,totalContentHeight : "0"
            ,totalWidth : "0"
            ,totalHeight : "0"
            ,draggerWidth : "59"
            ,draggerHeight : "21"
            ,settings_skin : "skin_dark"
            ,settings_mousewheel : "1"
            ,responsive : "off"
            ,pseudoresponsive : "off"
            ,settings_swipe: "on"
            ,settings_swipeOnDesktopsToo: "off"
        };
        o = $.extend(defaults, o);

        this.each( function() {
            // GLOBAL VARS
            var preload, i, tl, vidRoll, imgRoll, readBt, viewport, images, milestones, content, _scrollbar, track, dragger, marksAmount, fadeInDelay;
            //caching vars
            var cthis
                , _parent = null
                ,_parentParent = null
                ;
            //total vars
            var totalImagesWidth=0
                ,totalImagesHeight=0
                ,totalContentWidth=0
                ;
            var started = false
                ;
            var nrLoaded = 0
                ,nrChildren
                ;


            //responsive vars
            var conw
                ,conh
                ,newconh
                ,_rparent
                ,_rchis
                ,_vgparent
                ,prefull_scale = 1
                ,currScale = 1
                ;
            var ww
                , wh
                , tw // total w and h
                , th
                , cw // clip w and h
                , ch
                , realcw // clip w and h
                , realch
                ,origX = 0
                ;


            o.totalImagesWidth = parseInt(o.totalImagesWidth, 10);
            o.totalContentWidth = parseInt(o.totalContentWidth, 10);
            o.totalImagesHeight = parseInt(o.totalImagesHeight, 10);
            o.totalContentHeight = parseInt(o.totalContentHeight, 10);
            o.draggerWidth = parseInt(o.draggerWidth,10);
            o.draggerHeight = parseInt(o.draggerHeight,10);
            o.settings_mousewheel = parseInt(o.settings_mousewheel,10);

            cthis = $(this);



            ccon = cthis.parent().parent();
            if(ccon.hasClass('timeline_container_container')){
                _rparent = ccon;
                _parentParent = ccon;
                //_rparent = cthis.parent();
            }else{
                _rparent = ccon;

            }
            _rchis = cthis.parent();
            //console.log(ccon, _rparent);


            //SETUP VARS
            _parent = cthis.parent();

            preload = _parent.parent().find('.preload');
            tl = cthis;
            vidRoll = cthis.find('.video_rollover');
            imgRoll = cthis.find('.image_rollover');
            readBt = cthis.find('.readmore');
            viewport = cthis.find('.viewport').eq(0);
            images = viewport.find('.images');
            if(viewport.find('.real-inner').length>0){
                images=viewport.find('.real-inner').eq(0);
            }
            milestones = cthis.find('.milestones');
            content = cthis.find('.milestones .content');
            _scrollbar = cthis.find('.scrollbar');
            track = cthis.find('.scrollbar .track');
            dragger = cthis.find('.scrollbar .track .dragger');
            marksAmount = cthis.find('.marks > div').length;
            fadeInDelay = parseInt(tl.attr("data-fadeInDelay"));

            totalWidth = cthis.width();
            totalHeight = cthis.height();

            cthis.addClass(o.settings_skin);

            //console.log(images);
            images.addClass("images");


            if(o.responsive=='on'){
                o.pseudoresponsive='off';
            }

            if(o.pseudoresponsive=='on'){
                o.responsive='off';

            }
            //console.log(o.pseudoresponsive);


            nrChildren = images.children().length;
            images.children().each(function(){
                var _t = jQuery(this);
                var toload;
                if(_t.get(0).nodeName=="IMG"){
                    toload = _t.get(0);
                }else{
                    toload = _t.find('img').eq(0).get(0);
                }
                if(toload==undefined){
                    imageLoaded();
                }else{
                    if(toload.complete==true && toload.naturalWidth != 0){
                        imageLoaded();
                    }else{
                        jQuery(toload).bind('load', imageLoaded);
                    }
                }
            })



            setTimeout(handleReady, 5000); //failsafe in case the image loading

            function imageLoaded(e){
                nrLoaded++;
                if(nrLoaded >= nrChildren){
                    handleReady();
                }
            }
            function handleReady(){
                if(started==true){
                    return;
                }
                started=true;
                //console.log(images);
                for(i=0;i<images.children().length;i++){
                    if(images.children().eq(i).get(0)!=undefined && images.children().eq(i).get(0).naturalWidth != 0 && images.children().eq(i).get(0).naturalWidth!=undefined){
                        totalImagesWidth += parseInt(images.children().eq(i).get(0).naturalWidth,10);
                    }else{
                        totalImagesWidth += images.children().eq(i).width();
                    }

                    //console.log(images.children().eq(i), images.children().eq(i).width())
                }
                if(o.totalImagesWidth!=0){
                    totalImagesWidth = o.totalImagesWidth;
                }
                totalImagesHeight = images.children().eq(0).height();
                if(o.totalImagesHeight!=0){
                    totalImagesHeight = o.totalImagesHeight;
                }
                images.css('width', totalImagesWidth);
                viewport.css("height", totalImagesHeight);
                //_parent.css('width', totalImagesWidth);
                //console.log(totalImagesWidth)


                for(i=0;i<content.children().length;i++){
                    totalContentWidth+=content.children().eq(i).outerWidth() + 60; // 60 is the default margin + padding
                }
                if(o.totalContentWidth!=0){
                    totalContentWidth = o.totalContentWidth;
                }
                totalContentHeight = content.children().eq(0).outerHeight() + 20; // 20 is the default margin + padding
                if(o.totalContentHeight!=0){
                    totalContentHeight = o.totalContentHeight;
                }
                //console.log(content.children().eq(0), totalContentHeight)
                content.css('width', totalContentWidth);
                milestones.css("height", totalContentHeight);


                //CONFIG ALL ELEMENTS SIZES AND POSITIONS BASED ON HTML ATTRIBS
                _scrollbar.css("top", totalImagesHeight - o.draggerHeight);
                track.css("height", o.draggerHeight);
                dragger.css("height", o.draggerHeight);


                //PRELOAD & GLOBAL FADE IN
                preload.animate({ opacity:0 }, 500, settings_easing.easeOut);
                _parent.animate({ opacity:1 }, 1000, settings_easing.easeOut);

                //console.info(cthis, _parent, _parent.find('.timeline-preloader'));
                //_parent.find('.timeline-preloader').fadeOut('fast');
                if(_parentParent){
                    _parentParent.find('.timeline-preloader').fadeOut('slow');
                }

                //HTML5 AUDIO PLAYER
                if(audiojs && cthis.find('.audio_player').length>0){
                    audiojs.events.ready(function() {
                        //console.log(audiojs, cthis.find('.audio_player'));
                        var as = audiojs.createAll({
                            autoplay: true,
                            loop: true
                        });
                        audio.prettyPaused = 0;
                    });
                }


                //PRETTYPHOTO LIGHTBOX GALLERY
                $('a[data-rel]').each(function() {
                    $(this).attr('rel', $(this).data('rel'));
                });
                if(jQuery.fn.prettyPhoto){
                    $("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
                }

                //TIPSY - TOOLTIP
                if(jQuery.fn.tipsy){
                    readBt.tipsy({ gravity: 'w', fade: true, offset: 5 });
                }

                //IMAGE ROLLOVER ICON
                imgRoll.append("<span></span>");
                imgRoll.hover(function(){
                    $(this).children("span").stop(true, true).fadeIn(600);
                },function(){
                    $(this).children("span").stop(true, true).fadeOut(200);
                });


                //VIDEO ROLLOVER ICON
                vidRoll.append("<span></span>");
                vidRoll.hover(function(){
                    $(this).children("span").stop(true, true).fadeIn(600);
                },function(){
                    $(this).children("span").stop(true, true).fadeOut(200);
                });


                //VIDEO THUMB STOPS MUSIC ON CLICK (IF PLAYING)
                vidRoll.click(function() {
                    if (audio.playing) {
                        audio.prettyPaused = 1;
                        audio.pause();
                    } else {
                        audio.prettyPaused = 0;
                    }
                });


                //START DRAG IMAGES FUNCTION

                //startDrag(images);
                //console.log(tw, images, viewport);

                tw = viewport.outerWidth();
                cw = images.outerWidth();

                //console.log(tw, cw);


                //SCROLLBAR MILESTONES MARKS
                for ( var i = 0; i < marksAmount; i++ ) {
                    current = cthis.find('#m'+i);
                    current.stop(true, true)
                        .delay(fadeInDelay + 500)
                        .animate({ left:current.attr("data-xpos"), opacity:1 }, 700 + 100*i, settings_easing.easeOut)
                        .show()
                        .tipsy({ gravity: 's', fade: true, offset: 3, fallback: current.attr("data-label") });
                    current.bind('click', click_mark);
                };

                viewport.addClass('scroller-con');
                viewport.scroller({
                    settings_skin:'skin_pez',
                    settings_replacewheelxwithy:'on',
                    settings_refreshonresize:"on"
                    ,force_onlyx : 'on'
                    ,settings_disableSpecialIosFeatures: 'off'
                    ,secondCon : milestones.children('.content')
                });
                //INIT SCROLLBAR
                /*
                 tl.tinyscrollbar({
                 wheel: 20,
                 mouseWheel: o.settings_mousewheel,
                 size: totalWidth,
                 draggerWidth: o.draggerWidth
                 });
                 /*
                 */

                totalHeight = cthis.height();

                if(o.responsive=='on' || o.pseudoresponsive=='on'){
                    jQuery(window).bind('resize', handleResize);
                    handleResize();
                }


                if(o.settings_swipe=='on'){
                    if( !(is_ie() && version_ie()<9) && (o.settings_swipeOnDesktopsToo=='on' || (o.settings_swipeOnDesktopsToo=='off'&& (is_ios() || is_android() ))) ){
                        setupSwipe();
                    }
                }

            }

            function setupSwipe(){
                cthis.addClass('swipe-enabled');
                //console.log('setupSwipe');//swiping vars
                var down_x = 0
                    ,up_x = 0
                    ,screen_mousex = 0
                    ,dragging = false
                    ,def_x = 0
                    ,targetPositionX = 0
                    ,_swiper = images.parent()
                    ,target_swiper = null
                    ,sw_tw = cw //swiper total width
                    ,sw_ctw = _swiper.width()
                    ,auxx = 0
                    ,origX = 0
                    ,cratio = 0
                    ;

                var _t = cthis;

                cw=tw;
                sw_tw = cw;
                //console.log(_t);

                _swiper.bind('mousedown', function(e){
                    //console.log(e.timeStamp);
                    origX = parseInt(_swiper.css('left'));
                    target_swiper = cthis;
                    down_x = e.screenX;
                    def_x = 0;
                    dragging=true;
                    paused_roll=true;
                    cthis.addClass('closedhand');
                    return false;
                });

                //origX = 30;
                jQuery(document).bind('mousemove', function(e){
                    if(dragging==false){

                    }else{
                        screen_mousex = e.screenX;
                        targetPositionX = origX + def_x + (screen_mousex - down_x);
                        if(targetPositionX>0){
                            targetPositionX/=2;
                        }

                        if(targetPositionX<-sw_ctw+sw_tw){
                            //console.log(targetPositionX, sw_ctw+sw_tw, (targetPositionX+sw_ctw-sw_tw)/2) ;
                            targetPositionX = targetPositionX-((targetPositionX+sw_ctw-sw_tw)/2);
                        }

                        cratio = targetPositionX / (-sw_ctw+sw_tw);
                        //console.log(cratio) ; console.log(viewport, viewport.get(0).updateX);
                        if(viewport.get(0)!=undefined){
                            viewport.get(0).updateX(cratio);
                        }

                        //console.log(sw_ctw);
                        //console.log(origX, targetPositionX, (-sw_ctw+sw_tw));
                        _swiper.css('left', targetPositionX);
                        auxx = targetPositionX;
                        //console.log(cthis, origX, targetPositionX, e.timeStamp);
                    }
                });
                //jQuery(document).unbind('mouseup');
                jQuery(window).bind('mouseup', function(e){
//                    console.log(down_x, target_swiper);
                    /*
                     up_x = e.screenX;
                     */
                    if(target_swiper==null){
                        return;
                    }
                    cthis.removeClass('closedhand');

                    if(targetPositionX>0){
                        targetPositionX=0;
                    }
                    cratio = targetPositionX / (-sw_ctw+sw_tw);
                    //console.log(cratio) ; console.log(viewport, viewport.get(0).updateX);
                    if(viewport.get(0)!=undefined){
                        viewport.get(0).updateX(cratio);
                    }
                    if(targetPositionX<-sw_ctw+sw_tw){
                        targetPositionX = -sw_ctw+sw_tw;
                    }

                    _swiper.css('left', targetPositionX);


                    dragging=false;
                    //console.log(cthis, targetPositionX, origX, e.timeStamp);
                    //checkswipe();

                    paused_roll=false;
                    //console.log(tl);

                    target_swiper=null;

                    e.stopPropagation();
                    return false;
                    // down_x = e.originalEvent.touches[0].pageX;
                });
                _swiper.bind('click', function(e){
                    return false;
                });


                _swiper.bind('touchstart', function(e){
                    target_swiper = cthis;
                    down_x =  e.originalEvent.touches[0].pageX;

                    origX = parseInt(_swiper.css('left'),10);
                    if(isNaN(origX)){
                        origX = 0;
                    }
                    //console.log(down_x, origX, _swiper);
                    //def_x = base.currX;
                    dragging=true;
                    //return false;
                    paused_roll=true;
                    cthis.addClass('closedhand');
                });
                _swiper.bind('touchmove', function(e){
                    //e.preventDefault();
                    if(dragging==false){
                        return;
                    }else{
                        up_x = e.originalEvent.touches[0].pageX;
                        targetPositionX =  origX + def_x + (up_x - down_x);
                        if(targetPositionX>0){
                            targetPositionX/=2;
                        }
                        if(targetPositionX<-sw_ctw+sw_tw){
                            //console.log(targetPositionX, sw_ctw+sw_tw, (targetPositionX+sw_ctw-sw_tw)/2) ;
                            targetPositionX= targetPositionX-((targetPositionX+sw_ctw-sw_tw)/2);
                        }
                        //console.log(targetPositionX, origX + def_x + (up_x - down_x), def_x, origX);
                        _swiper.css('left', targetPositionX);
                    }
                    if(up_x>50){
                        return false;
                    }
                });
                _swiper.bind('touchend', function(e){
                    dragging=false;
                    //checkswipe();
                    paused_roll=false;


                    cthis.removeClass('closedhand');

                    if(targetPositionX>0){
                        targetPositionX=0;
                    }

                    if(targetPositionX<-sw_ctw+sw_tw){
                        targetPositionX = -sw_ctw+sw_tw;
                    }
                    _swiper.css('left', targetPositionX);

                    origX = targetPositionX;
                });


                function slide_left(){
                }
                function slide_right(){
                }
                /*
                 */
            }


            function handleResize(e){
                //ww = jQuery(this).width();
                //wh = jQuery(this).height();
                //console.log('ceva');

                conw = _rparent.width();


                if(o.pseudoresponsive=='on'){
                    var aux = 'scale(' + (conw/totalWidth) + ')';
                    _rchis.get(0).var_scale = (conw/totalWidth);
                    var newconh = (conw/totalWidth) * totalHeight;
                    //console.log(conw, totalWidth, totalHeight)


                    //console.log('ceva', ww, wh, conw, conh, totalWidth, totalHeight, (conw/totalWidth));
                    if(conw < totalWidth){
                        _rchis.css({
                            '-moz-transform' : aux
                            , 'transform' : aux
                            , '-webkit-transform' : aux
                            , '-o-transform' : aux
                            //, 'width' : 'auto'
                        })
                        ccon.css({
                            'height' : newconh
                        })
                    }else{
                        _rchis.css({
                            '-moz-transform' : ''
                            , '-webkit-transform' : ''
                            , '-o-transform' : ''
                            //, 'width' : 'auto'
                        })
                        ccon.css({
                            'height' : 'auto'
                        })
                    }

                }
                if(o.responsive=='on'){
                    //console.log(cthis.width(), o.draggerWidth);
                    totalWidth = cthis.width();
                    //INIT SCROLLBAR
                    //console.log(totalWidth);
                    /*
                     tl.tinyscrollbar({
                     wheel: 20,
                     mouseWheel: o.settings_mousewheel,
                     size: totalWidth,
                     draggerWidth: o.draggerWidth
                     });
                     /*
                     */
                }
            }

            function click_mark(){
                var _t = $(this);
                cratio = parseInt(_t.css('left'), 10) / cthis.width();
                //console.log(parseInt(_t.css('left'), 10), totalWidth);
                //console.log(cratio);


                var otherargs = {};

                if(_t.attr('data-linktomilestone')!=undefined){


                    var milestonenr = parseInt(_t.attr('data-linktomilestone'), 10);

                    var dist = cthis.find('.milestones .content').children().eq(milestonenr).offset().left - cthis.find('.milestones .content').offset().left;

//            console.log(cthis.find('.milestones .content').children().eq(milestonenr).offset().left, cthis.find('.milestones .content').offset().left, cthis.find('.milestones .content').children().eq(milestonenr), dist)

                    otherargs.secondCon_targetX = -dist;
                }

                if(viewport.get(0)!=undefined){
                    viewport.get(0).updateX(cratio, otherargs);
                }
                //console.log(totalWidth);
            }


            return this;
        }); // end each
    }
})(jQuery);