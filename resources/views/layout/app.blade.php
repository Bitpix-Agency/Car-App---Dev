<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title') | Trade 2 Trade</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/431c4e3525.js" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg4rr5cIi6ZuBLQKWUg0E3p2LMS0kXlxU&callback=initMap&libraries=&v=weekly"  async></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css'>
	    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css'>
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=607570eb4d36eb0018700b23&product=inline-share-buttons" async="async"></script>
        <script src="https://media-editor.cloudinary.com/all.js" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slider-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        @livewireStyles
	</head>
	<body>
        @yield('content')
		<section class="sec-cls subscribe-area pb-50 pt-70" id="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-md-2 respo-30">
						<div class="subscribe-text mb-15">
							<h2>Newsletter</h2>
						</div>
					</div>
					<div class="col-md-6 respo-70">
                           <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
                             <div style="text-align: center;">
                               <form method="POST" action="https://trade-2-trade.activehosted.com/proc.php" id="_form_5_" class="_form _form_5 _inline-form _inline-style _dark" novalidate>
                                 <input type="hidden" name="u" value="5" />
                                 <input type="hidden" name="f" value="5" />
                                 <input type="hidden" name="s" />
                                 <input type="hidden" name="c" value="0" />
                                 <input type="hidden" name="m" value="0" />
                                 <input type="hidden" name="act" value="sub" />
                                 <input type="hidden" name="v" value="2" />
                                 <div class="_form-content">
                                   <div class="_form_element _x37288867 _inline-style " >
                                     <label class="_form-label">
                                       &nbsp;
                                     </label>
                                     <div class="_field-wrapper">
                                       <input type="text" name="email" placeholder="Type your email" required/>
                                     </div>
                                   </div>
                                   <div class="_button-wrapper _inline-style">
                                     <button id="_form_5_submit" class="_submit" type="submit">
                                       Sign Up
                                     </button>
                                   </div>
                                   <div class="_clear-element">
                                   </div>
                                 </div>
                                 <div class="_form-thank-you" style="display:none;">
                                 </div>
                               </form>
                             </div>
                        <script type="text/javascript">
                           window.cfields = [];
                           window._show_thank_you = function(id, message, trackcmp_url, email) {
                             var form = document.getElementById('_form_' + id + '_'), thank_you = form.querySelector('._form-thank-you');
                             form.querySelector('._form-content').style.display = 'none';
                             thank_you.innerHTML = message;
                             thank_you.style.display = 'block';
                             const vgoAlias = typeof visitorGlobalObjectAlias === 'undefined' ? 'vgo' : visitorGlobalObjectAlias;
                             var visitorObject = window[vgoAlias];
                             if (email && typeof visitorObject !== 'undefined') {
                               visitorObject('setEmail', email);
                               visitorObject('update');
                             } else if (typeof(trackcmp_url) != 'undefined' && trackcmp_url) {
                               // Site tracking URL to use after inline form submission.
                               _load_script(trackcmp_url);
                             }
                             if (typeof window._form_callback !== 'undefined') window._form_callback(id);
                           };
                           window._show_error = function(id, message, html) {
                             var form = document.getElementById('_form_' + id + '_'), err = document.createElement('div'), button = form.querySelector('button'), old_error = form.querySelector('._form_error');
                             if (old_error) old_error.parentNode.removeChild(old_error);
                             err.innerHTML = message;
                             err.className = '_error-inner _form_error _no_arrow';
                             var wrapper = document.createElement('div');
                             wrapper.className = '_form-inner';
                             wrapper.appendChild(err);
                             button.parentNode.insertBefore(wrapper, button);
                             document.querySelector('[id^="_form"][id$="_submit"]').disabled = false;
                             if (html) {
                               var div = document.createElement('div');
                               div.className = '_error-html';
                               div.innerHTML = html;
                               err.appendChild(div);
                             }
                           };
                           window._load_script = function(url, callback) {
                             var head = document.querySelector('head'), script = document.createElement('script'), r = false;
                             script.type = 'text/javascript';
                             script.charset = 'utf-8';
                             script.src = url;
                             if (callback) {
                               script.onload = script.onreadystatechange = function() {
                                 if (!r && (!this.readyState || this.readyState == 'complete')) {
                                   r = true;
                                   callback();
                                 }
                               };
                             }
                             head.appendChild(script);
                           };
                           (function() {
                             if (window.location.search.search("excludeform") !== -1) return false;
                             var getCookie = function(name) {
                               var match = document.cookie.match(new RegExp('(^|; )' + name + '=([^;]+)'));
                               return match ? match[2] : null;
                             }
                             var setCookie = function(name, value) {
                               var now = new Date();
                               var time = now.getTime();
                               var expireTime = time + 1000 * 60 * 60 * 24 * 365;
                               now.setTime(expireTime);
                               document.cookie = name + '=' + value + '; expires=' + now + ';path=/';
                             }
                                 var addEvent = function(element, event, func) {
                               if (element.addEventListener) {
                                 element.addEventListener(event, func);
                               } else {
                                 var oldFunc = element['on' + event];
                                 element['on' + event] = function() {
                                   oldFunc.apply(this, arguments);
                                   func.apply(this, arguments);
                                 };
                               }
                             }
                             var _removed = false;
                             var form_to_submit = document.getElementById('_form_5_');
                             var allInputs = form_to_submit.querySelectorAll('input, select, textarea'), tooltips = [], submitted = false;

                             var getUrlParam = function(name) {
                               var regexStr = '[\?&]' + name + '=([^&#]*)';
                               var results = new RegExp(regexStr, 'i').exec(window.location.href);
                               return results != undefined ? decodeURIComponent(results[1]) : false;
                             };

                             for (var i = 0; i < allInputs.length; i++) {
                               var regexStr = "field\\[(\\d+)\\]";
                               var results = new RegExp(regexStr).exec(allInputs[i].name);
                               if (results != undefined) {
                                 allInputs[i].dataset.name = window.cfields[results[1]];
                               } else {
                                 allInputs[i].dataset.name = allInputs[i].name;
                               }
                               var fieldVal = getUrlParam(allInputs[i].dataset.name);

                               if (fieldVal) {
                                 if (allInputs[i].dataset.autofill === "false") {
                                   continue;
                                 }
                                 if (allInputs[i].type == "radio" || allInputs[i].type == "checkbox") {
                                   if (allInputs[i].value == fieldVal) {
                                     allInputs[i].checked = true;
                                   }
                                 } else {
                                   allInputs[i].value = fieldVal;
                                 }
                               }
                             }

                             var remove_tooltips = function() {
                               for (var i = 0; i < tooltips.length; i++) {
                                 tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
                               }
                               tooltips = [];
                             };
                             var remove_tooltip = function(elem) {
                               for (var i = 0; i < tooltips.length; i++) {
                                 if (tooltips[i].elem === elem) {
                                   tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
                                   tooltips.splice(i, 1);
                                   return;
                                 }
                               }
                             };
                             var create_tooltip = function(elem, text) {
                               var tooltip = document.createElement('div'), arrow = document.createElement('div'), inner = document.createElement('div'), new_tooltip = {};
                               if (elem.type != 'radio' && elem.type != 'checkbox') {
                                 tooltip.className = '_error';
                                 arrow.className = '_error-arrow';
                                 inner.className = '_error-inner';
                                 inner.innerHTML = text;
                                 tooltip.appendChild(arrow);
                                 tooltip.appendChild(inner);
                                 elem.parentNode.appendChild(tooltip);
                               } else {
                                 tooltip.className = '_error-inner _no_arrow';
                                 tooltip.innerHTML = text;
                                 elem.parentNode.insertBefore(tooltip, elem);
                                 new_tooltip.no_arrow = true;
                               }
                               new_tooltip.tip = tooltip;
                               new_tooltip.elem = elem;
                               tooltips.push(new_tooltip);
                               return new_tooltip;
                             };
                             var resize_tooltip = function(tooltip) {
                               var rect = tooltip.elem.getBoundingClientRect();
                               var doc = document.documentElement, scrollPosition = rect.top - ((window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0));
                               if (scrollPosition < 40) {
                                 tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _below';
                               } else {
                                 tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _above';
                               }
                             };
                             var resize_tooltips = function() {
                               if (_removed) return;
                               for (var i = 0; i < tooltips.length; i++) {
                                 if (!tooltips[i].no_arrow) resize_tooltip(tooltips[i]);
                               }
                             };
                             var validate_field = function(elem, remove) {
                               var tooltip = null, value = elem.value, no_error = true;
                               remove ? remove_tooltip(elem) : false;
                               if (elem.type != 'checkbox') elem.className = elem.className.replace(/ ?_has_error ?/g, '');
                               if (elem.getAttribute('required') !== null) {
                                 if (elem.type == 'radio' || (elem.type == 'checkbox' && /any/.test(elem.className))) {
                                   var elems = form_to_submit.elements[elem.name];
                                   if (!(elems instanceof NodeList || elems instanceof HTMLCollection) || elems.length <= 1) {
                                     no_error = elem.checked;
                                   }
                                   else {
                                     no_error = false;
                                     for (var i = 0; i < elems.length; i++) {
                                       if (elems[i].checked) no_error = true;
                                     }
                                   }
                                   if (!no_error) {
                                     tooltip = create_tooltip(elem, "Please select an option.");
                                   }
                                 } else if (elem.type =='checkbox') {
                                   var elems = form_to_submit.elements[elem.name], found = false, err = [];
                                   no_error = true;
                                   for (var i = 0; i < elems.length; i++) {
                                     if (elems[i].getAttribute('required') === null) continue;
                                     if (!found && elems[i] !== elem) return true;
                                     found = true;
                                     elems[i].className = elems[i].className.replace(/ ?_has_error ?/g, '');
                                     if (!elems[i].checked) {
                                       no_error = false;
                                       elems[i].className = elems[i].className + ' _has_error';
                                       err.push("Checking %s is required".replace("%s", elems[i].value));
                                     }
                                   }
                                   if (!no_error) {
                                     tooltip = create_tooltip(elem, err.join('<br/>'));
                                   }
                                 } else if (elem.tagName == 'SELECT') {
                                   var selected = true;
                                   if (elem.multiple) {
                                     selected = false;
                                     for (var i = 0; i < elem.options.length; i++) {
                                       if (elem.options[i].selected) {
                                         selected = true;
                                         break;
                                       }
                                     }
                                   } else {
                                     for (var i = 0; i < elem.options.length; i++) {
                                       if (elem.options[i].selected && !elem.options[i].value) {
                                         selected = false;
                                       }
                                     }
                                   }
                                   if (!selected) {
                                     elem.className = elem.className + ' _has_error';
                                     no_error = false;
                                     tooltip = create_tooltip(elem, "Please select an option.");
                                   }
                                 } else if (value === undefined || value === null || value === '') {
                                   elem.className = elem.className + ' _has_error';
                                   no_error = false;
                                   tooltip = create_tooltip(elem, "This field is required.");
                                 }
                               }
                               if (no_error && elem.name == 'email') {
                                 if (!value.match(/^[\+_a-z0-9-'&=]+(\.[\+_a-z0-9-']+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i)) {
                                   elem.className = elem.className + ' _has_error';
                                   no_error = false;
                                   tooltip = create_tooltip(elem, "Enter a valid email address.");
                                 }
                               }
                               if (no_error && /date_field/.test(elem.className)) {
                                 if (!value.match(/^\d\d\d\d-\d\d-\d\d$/)) {
                                   elem.className = elem.className + ' _has_error';
                                   no_error = false;
                                   tooltip = create_tooltip(elem, "Enter a valid date.");
                                 }
                               }
                               tooltip ? resize_tooltip(tooltip) : false;
                               return no_error;
                             };
                             var needs_validate = function(el) {
                                   if(el.getAttribute('required') !== null){
                                       return true
                                   }
                                   if(el.name === 'email' && el.value !== ""){
                                       return true
                                   }
                                   return false
                             };
                             var validate_form = function(e) {
                               var err = form_to_submit.querySelector('._form_error'), no_error = true;
                               if (!submitted) {
                                 submitted = true;
                                 for (var i = 0, len = allInputs.length; i < len; i++) {
                                   var input = allInputs[i];
                                   if (needs_validate(input)) {
                                     if (input.type == 'text') {
                                       addEvent(input, 'blur', function() {
                                         this.value = this.value.trim();
                                         validate_field(this, true);
                                       });
                                       addEvent(input, 'input', function() {
                                         validate_field(this, true);
                                       });
                                     } else if (input.type == 'radio' || input.type == 'checkbox') {
                                       (function(el) {
                                         var radios = form_to_submit.elements[el.name];
                                         for (var i = 0; i < radios.length; i++) {
                                           addEvent(radios[i], 'click', function() {
                                             validate_field(el, true);
                                           });
                                         }
                                       })(input);
                                     } else if (input.tagName == 'SELECT') {
                                       addEvent(input, 'change', function() {
                                         validate_field(this, true);
                                       });
                                     } else if (input.type == 'textarea'){
                                       addEvent(input, 'input', function() {
                                         validate_field(this, true);
                                       });
                                     }
                                   }
                                 }
                               }
                               remove_tooltips();
                               for (var i = 0, len = allInputs.length; i < len; i++) {
                                 var elem = allInputs[i];
                                 if (needs_validate(elem)) {
                                   if (elem.tagName.toLowerCase() !== "select") {
                                     elem.value = elem.value.trim();
                                   }
                                   validate_field(elem) ? true : no_error = false;
                                 }
                               }
                               if (!no_error && e) {
                                 e.preventDefault();
                               }
                               resize_tooltips();
                               return no_error;
                             };
                             addEvent(window, 'resize', resize_tooltips);
                             addEvent(window, 'scroll', resize_tooltips);
                             window._old_serialize = null;
                             if (typeof serialize !== 'undefined') window._old_serialize = window.serialize;
                             _load_script("//d3rxaij56vjege.cloudfront.net/form-serialize/0.3/serialize.min.js", function() {
                               window._form_serialize = window.serialize;
                               if (window._old_serialize) window.serialize = window._old_serialize;
                             });
                             var form_submit = function(e) {
                               e.preventDefault();
                               if (validate_form()) {
                                 // use this trick to get the submit button & disable it using plain javascript
                                 document.querySelector('#_form_5_submit').disabled = true;
                                       var serialized = _form_serialize(document.getElementById('_form_5_'));
                                 var err = form_to_submit.querySelector('._form_error');
                                 err ? err.parentNode.removeChild(err) : false;
                                 _load_script('https://trade-2-trade.activehosted.com/proc.php?' + serialized + '&jsonp=true');
                               }
                               return false;
                             };
                             addEvent(form_to_submit, 'submit', form_submit);
                           })();

                           </script>
                    </div>
					<div class="col-md-4 resp-100">
						<div class="subscribe-text">
							<p>Subscribe to our newsletter and stay updated with our latest releases</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer class="footer-cls">
			<div class="container">
				<!-- Copyright -->
				<div class="row">
					<div class="col-sm-6 col-lg-6 footer1">
						<span class="footer-txt">Copyright © {{ now()->year }}. All rights reserved.</span>
					</div>
					<div class="col-sm-6 col-lg-6 footer2">
						<a class="footer-txt support-text">
                            <a href="mailto:support@trade-2-trade.co.uk" class="text-white">
                                support@trade-2-trade.co.uk
                            </a>
                        </span>
                        <a href="https://www.facebook.com/groups/304231463443682" target="_blank" class="text-white">
                            <span class="footer-right-icon">
                                <i class="fab fa-facebook-f"></i>
                            </span>
                        </a>
                        <a href="https://www.instagram.com/trade.2.trade/" target="_blank" class="text-white">
                            <span class="footer-right-icon ml-2">
                                <i class="fab fa-instagram"></i>
                            </span>
                        </a>
                        <a href="https://www.linkedin.com/company/trade-to-trade-group/" target="_blank" class="text-white">
                            <span class="footer-right-icon ml-2">
                            <i class="fab fa-linkedin"></i>
                        </span>
                        </a>
                        <a href="https://www.youtube.com/channel/UC3EQ2inLPGN452gmw3GYZqg" target="_blank" class="text-white">
                            <span class="footer-right-icon ml-2">
                            <i class="fab fa-youtube"></i>
                        </span>
                        </a>

					</div>
				</div>
			</div>
			<!-- Copyright -->
		</footer>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
		<script src='https://code.jquery.com/ui/1.10.4/jquery-ui.min.js'></script>
        <script  src="{{ asset('js/script.js') }}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js'></script>
        @livewireScripts
		<script>
			$('.pop-right-inner button').on('click', function(){
			    $('button.current').removeClass('current');
			    $(this).addClass('current');
			});

		</script>
		<style>
			html {
			font-size: 100%;
			}
		</style>
	</body>
</html>
