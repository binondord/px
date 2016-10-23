(function(e){"use strict";if(typeof define==="function"&&define.amd){define(["jquery"],e)}else{e(jQuery)}})(function(e){"use strict";function r(t,n){var i=function(){},s=this,o={autoSelectFirst:false,appendTo:"body",serviceUrl:null,lookup:null,onSelect:null,width:"auto",minChars:2,maxHeight:340,deferRequestBy:0,params:{},formatResult:r.formatResult,delimiter:null,zIndex:9999,type:"GET",noCache:false,onSearchStart:i,onSearchComplete:i,onSearchError:i,containerClass:"autocomplete-suggestions",tabDisabled:false,dataType:"text",currentRequest:null,triggerSelectOnValidInput:true,preventBadQueries:true,lookupFilter:function(e,t,n){return e.value.toLowerCase().indexOf(n)!==-1},paramName:"query",transformResult:function(t){return typeof t==="string"?e.parseJSON(t):t}};s.element=t;s.el=e(t);s.suggestions=[];s.badQueries=[];s.selectedIndex=-1;s.currentValue=s.element.value;s.intervalId=0;s.cachedResponse={};s.onChangeInterval=null;s.onChange=null;s.isLocal=false;s.suggestionsContainer=null;s.options=e.extend({},o,n);s.classes={selected:"autocomplete-selected",suggestion:"autocomplete-suggestion"};s.hint=null;s.hintValue="";s.selection=null;s.initialize();s.setOptions(n)}var t=function(){return{escapeRegExChars:function(e){return e.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")},createNode:function(e){var t=document.createElement("div");t.className=e;t.style.position="absolute";t.style.display="none";return t}}}(),n={ESC:27,TAB:9,RETURN:13,LEFT:37,UP:38,RIGHT:39,DOWN:40};r.utils=t;e.Autocomplete=r;r.formatResult=function(e,n){var r="("+t.escapeRegExChars(n)+")";return e.value.replace(new RegExp(r,"gi"),"<strong>$1</strong>")};r.prototype={killerFn:null,initialize:function(){var t=this,n="."+t.classes.suggestion,i=t.classes.selected,s=t.options,o;t.element.setAttribute("autocomplete","off");t.killerFn=function(n){if(e(n.target).closest("."+t.options.containerClass).length===0){t.killSuggestions();t.disableKillerFn()}};t.suggestionsContainer=r.utils.createNode(s.containerClass);o=e(t.suggestionsContainer);o.appendTo(s.appendTo);if(s.width!=="auto"){o.width(s.width)}o.on("mouseover.autocomplete",n,function(){t.activate(e(this).data("index"))});o.on("mouseout.autocomplete",function(){t.selectedIndex=-1;o.children("."+i).removeClass(i)});o.on("click.autocomplete",n,function(){t.select(e(this).data("index"))});t.fixPosition();t.fixPositionCapture=function(){if(t.visible){t.fixPosition()}};e(window).on("resize.autocomplete",t.fixPositionCapture);t.el.on("keydown.autocomplete",function(e){t.onKeyPress(e)});t.el.on("keyup.autocomplete",function(e){t.onKeyUp(e)});t.el.on("blur.autocomplete",function(){t.onBlur()});t.el.on("focus.autocomplete",function(){t.onFocus()});t.el.on("change.autocomplete",function(e){t.onKeyUp(e)})},onFocus:function(){var e=this;e.fixPosition();if(e.options.minChars<=e.el.val().length){e.onValueChange()}},onBlur:function(){this.enableKillerFn()},setOptions:function(t){var n=this,r=n.options;e.extend(r,t);n.isLocal=e.isArray(r.lookup);if(n.isLocal){r.lookup=n.verifySuggestionsFormat(r.lookup)}e(n.suggestionsContainer).css({"max-height":r.maxHeight+"px",width:r.width+"px","z-index":r.zIndex})},clearCache:function(){this.cachedResponse={};this.badQueries=[]},clear:function(){this.clearCache();this.currentValue="";this.suggestions=[]},disable:function(){var e=this;e.disabled=true;if(e.currentRequest){e.currentRequest.abort()}},enable:function(){this.disabled=false},fixPosition:function(){var t=this,n,r;if(t.options.appendTo!=="body"){return}n=t.el.offset();r={top:n.top+t.el.outerHeight()+"px",left:n.left+"px"};if(t.options.width==="auto"){r.width=t.el.outerWidth()-2+"px"}e(t.suggestionsContainer).css(r)},enableKillerFn:function(){var t=this;e(document).on("click.autocomplete",t.killerFn)},disableKillerFn:function(){var t=this;e(document).off("click.autocomplete",t.killerFn)},killSuggestions:function(){var e=this;e.stopKillSuggestions();e.intervalId=window.setInterval(function(){e.hide();e.stopKillSuggestions()},50)},stopKillSuggestions:function(){window.clearInterval(this.intervalId)},isCursorAtEnd:function(){var e=this,t=e.el.val().length,n=e.element.selectionStart,r;if(typeof n==="number"){return n===t}if(document.selection){r=document.selection.createRange();r.moveStart("character",-t);return t===r.text.length}return true},onKeyPress:function(e){var t=this;if(!t.disabled&&!t.visible&&e.which===n.DOWN&&t.currentValue){t.suggest();return}if(t.disabled||!t.visible){return}switch(e.which){case n.ESC:t.el.val(t.currentValue);t.hide();break;case n.RIGHT:if(t.hint&&t.options.onHint&&t.isCursorAtEnd()){t.selectHint();break}return;case n.TAB:if(t.hint&&t.options.onHint){t.selectHint();return};case n.RETURN:if(t.selectedIndex===-1){t.hide();return}t.select(t.selectedIndex);if(e.which===n.TAB&&t.options.tabDisabled===false){return}break;case n.UP:t.moveUp();break;case n.DOWN:t.moveDown();break;default:return}e.stopImmediatePropagation();e.preventDefault()},onKeyUp:function(e){var t=this;if(t.disabled){return}switch(e.which){case n.UP:case n.DOWN:return}clearInterval(t.onChangeInterval);if(t.currentValue!==t.el.val()){t.findBestHint();if(t.options.deferRequestBy>0){t.onChangeInterval=setInterval(function(){t.onValueChange()},t.options.deferRequestBy)}else{t.onValueChange()}}},onValueChange:function(){var t=this,n=t.options,r=t.el.val(),i=t.getQuery(r),s;if(t.selection){t.selection=null;(n.onInvalidateSelection||e.noop).call(t.element)}clearInterval(t.onChangeInterval);t.currentValue=r;t.selectedIndex=-1;if(n.triggerSelectOnValidInput){s=t.findSuggestionIndex(i);if(s!==-1){t.select(s);return}}if(i.length<n.minChars){t.hide()}else{t.getSuggestions(i)}},findSuggestionIndex:function(t){var n=this,r=-1,i=t.toLowerCase();e.each(n.suggestions,function(e,t){if(t.value.toLowerCase()===i){r=e;return false}});return r},getQuery:function(t){var n=this.options.delimiter,r;if(!n){return t}r=t.split(n);return e.trim(r[r.length-1])},getSuggestionsLocal:function(t){var n=this,r=n.options,i=t.toLowerCase(),s=r.lookupFilter,o=parseInt(r.lookupLimit,10),u;u={suggestions:e.grep(r.lookup,function(e){return s(e,t,i)})};if(o&&u.suggestions.length>o){u.suggestions=u.suggestions.slice(0,o)}return u},getSuggestions:function(t){var n,r=this,i=r.options,s=i.serviceUrl,o,u;i.params[i.paramName]=t;o=i.ignoreParams?null:i.params;if(r.isLocal){n=r.getSuggestionsLocal(t)}else{if(e.isFunction(s)){s=s.call(r.element,t)}u=s+"?"+e.param(o||{});n=r.cachedResponse[u]}if(n&&e.isArray(n.suggestions)){r.suggestions=n.suggestions;r.suggest()}else if(!r.isBadQuery(t)){if(i.onSearchStart.call(r.element,i.params)===false){return}if(r.currentRequest){r.currentRequest.abort()}r.currentRequest=e.ajax({url:s,data:o,type:i.type,dataType:i.dataType}).done(function(e){var n;r.currentRequest=null;n=i.transformResult(e);r.processResponse(n,t,u);i.onSearchComplete.call(r.element,t,n.suggestions)}).fail(function(e,n,s){i.onSearchError.call(r.element,t,e,n,s)})}},isBadQuery:function(e){if(!this.options.preventBadQueries){return false}var t=this.badQueries,n=t.length;while(n--){if(e.indexOf(t[n])===0){return true}}return false},hide:function(){var t=this;t.visible=false;t.selectedIndex=-1;e(t.suggestionsContainer).hide();t.signalHint(null)},suggest:function(){if(this.suggestions.length===0){this.hide();return}var t=this,n=t.options,r=n.formatResult,i=t.getQuery(t.currentValue),s=t.classes.suggestion,o=t.classes.selected,u=e(t.suggestionsContainer),a=n.beforeRender,f="",l,c;if(n.triggerSelectOnValidInput){l=t.findSuggestionIndex(i);if(l!==-1){t.select(l);return}}e.each(t.suggestions,function(e,t){f+='<div class="'+s+'" data-index="'+e+'">'+r(t,i)+"</div>"});if(n.width==="auto"){c=t.el.outerWidth()-2;u.width(c>0?c:300)}u.html(f);if(n.autoSelectFirst){t.selectedIndex=0;u.children().first().addClass(o)}if(e.isFunction(a)){a.call(t.element,u)}u.show();t.visible=true;t.findBestHint()},findBestHint:function(){var t=this,n=t.el.val().toLowerCase(),r=null;if(!n){return}e.each(t.suggestions,function(e,t){var i=t.value.toLowerCase().indexOf(n)===0;if(i){r=t}return!i});t.signalHint(r)},signalHint:function(t){var n="",r=this;if(t){n=r.currentValue+t.value.substr(r.currentValue.length)}if(r.hintValue!==n){r.hintValue=n;r.hint=t;(this.options.onHint||e.noop)(n)}},verifySuggestionsFormat:function(t){if(t.length&&typeof t[0]==="string"){return e.map(t,function(e){return{value:e,data:null}})}return t},processResponse:function(e,t,n){var r=this,i=r.options;e.suggestions=r.verifySuggestionsFormat(e.suggestions);if(!i.noCache){r.cachedResponse[n]=e;if(i.preventBadQueries&&e.suggestions.length===0){r.badQueries.push(t)}}if(t!==r.getQuery(r.currentValue)){return}r.suggestions=e.suggestions;r.suggest()},activate:function(t){var n=this,r,i=n.classes.selected,s=e(n.suggestionsContainer),o=s.children();s.children("."+i).removeClass(i);n.selectedIndex=t;if(n.selectedIndex!==-1&&o.length>n.selectedIndex){r=o.get(n.selectedIndex);e(r).addClass(i);return r}return null},selectHint:function(){var t=this,n=e.inArray(t.hint,t.suggestions);t.select(n)},select:function(e){var t=this;t.hide();t.onSelect(e)},moveUp:function(){var t=this;if(t.selectedIndex===-1){return}if(t.selectedIndex===0){e(t.suggestionsContainer).children().first().removeClass(t.classes.selected);t.selectedIndex=-1;t.el.val(t.currentValue);t.findBestHint();return}t.adjustScroll(t.selectedIndex-1)},moveDown:function(){var e=this;if(e.selectedIndex===e.suggestions.length-1){return}e.adjustScroll(e.selectedIndex+1)},adjustScroll:function(t){var n=this,r=n.activate(t),i,s,o,u=25;if(!r){return}i=r.offsetTop;s=e(n.suggestionsContainer).scrollTop();o=s+n.options.maxHeight-u;if(i<s){e(n.suggestionsContainer).scrollTop(i)}else if(i>o){e(n.suggestionsContainer).scrollTop(i-n.options.maxHeight+u)}n.el.val(n.getValue(n.suggestions[t].value));n.signalHint(null)},onSelect:function(t){var n=this,r=n.options.onSelect,i=n.suggestions[t];n.currentValue=n.getValue(i.value);n.el.val(n.currentValue);n.signalHint(null);n.suggestions=[];n.selection=i;if(e.isFunction(r)){r.call(n.element,i)}},getValue:function(e){var t=this,n=t.options.delimiter,r,i;if(!n){return e}r=t.currentValue;i=r.split(n);if(i.length===1){return e}return r.substr(0,r.length-i[i.length-1].length)+e},dispose:function(){var t=this;t.el.off(".autocomplete").removeData("autocomplete");t.disableKillerFn();e(window).off("resize.autocomplete",t.fixPositionCapture);e(t.suggestionsContainer).remove()}};e.fn.autocomplete=function(t,n){var i="autocomplete";if(arguments.length===0){return this.first().data(i)}return this.each(function(){var s=e(this),o=s.data(i);if(typeof t==="string"){if(o&&typeof o[t]==="function"){o[t](n)}}else{if(o&&o.dispose){o.dispose()}o=new r(this,t);s.data(i,o)}})}})