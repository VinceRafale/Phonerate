/*
launch-effect - v - 2013-08-19
A viral marketing theme for WordPress empowering designers, marketers, and enthusiasts to build websites with relative ease
Lovingly coded by Barrel  - http://barrelny.com 
*/
/*
 * jqModal - Minimalist Modaling with jQuery
 *   (http://dev.iceburg.net/jquery/jqModal/)
 *
 * Copyright (c) 2007,2008 Brice Burgess <bhb@iceburg.net>
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 * 
 * $Version: 03/01/2009 +r14
 */
(function($) {
$.fn.jqm=function(o){
var p={
overlay: 50,
overlayClass: 'jqmOverlay',
closeClass: 'jqmClose',
trigger: '.jqModal',
ajax: F,
ajaxText: '',
target: F,
modal: F,
toTop: F,
onShow: F,
onHide: F,
onLoad: F
};
return this.each(function(){if(this._jqm)return H[this._jqm].c=$.extend({},H[this._jqm].c,o);s++;this._jqm=s;
H[s]={c:$.extend(p,$.jqm.params,o),a:F,w:$(this).addClass('jqmID'+s),s:s};
if(p.trigger)$(this).jqmAddTrigger(p.trigger);
});};

$.fn.jqmAddClose=function(e){return hs(this,e,'jqmHide');};
$.fn.jqmAddTrigger=function(e){return hs(this,e,'jqmShow');};
$.fn.jqmShow=function(t){return this.each(function(){t=t||window.event;$.jqm.open(this._jqm,t);});};
$.fn.jqmHide=function(t){return this.each(function(){t=t||window.event;$.jqm.close(this._jqm,t)});};

$.jqm = {
hash:{},
open:function(s,t){var h=H[s],c=h.c,cc='.'+c.closeClass,z=(parseInt(h.w.css('z-index'))),z=(z>0)?z:3000,o=$('<div></div>').css({height:'100%',width:'100%',position:'fixed',left:0,top:0,'z-index':z-1,opacity:c.overlay/100});if(h.a)return F;h.t=t;h.a=true;h.w.css('z-index',z);
 if(c.modal) {if(!A[0])L('bind');A.push(s);}
 else if(c.overlay > 0)h.w.jqmAddClose(o);
 else o=F;

 h.o=(o)?o.addClass(c.overlayClass).prependTo('body'):F;
 if(ie6){$('html,body').css({height:'100%',width:'100%'});if(o){o=o.css({position:'absolute'})[0];for(var y in {Top:1,Left:1})o.style.setExpression(y.toLowerCase(),"(_=(document.documentElement.scroll"+y+" || document.body.scroll"+y+"))+'px'");}}

 if(c.ajax) {var r=c.target||h.w,u=c.ajax,r=(typeof r == 'string')?$(r,h.w):$(r),u=(u.substr(0,1) == '@')?$(t).attr(u.substring(1)):u;
  r.html(c.ajaxText).load(u,function(){if(c.onLoad)c.onLoad.call(this,h);if(cc)h.w.jqmAddClose($(cc,h.w));e(h);});}
 else if(cc)h.w.jqmAddClose($(cc,h.w));

 if(c.toTop&&h.o)h.w.before('<span id="jqmP'+h.w[0]._jqm+'"></span>').insertAfter(h.o);	
 (c.onShow)?c.onShow(h):h.w.show();e(h);return F;
},
close:function(s){var h=H[s];if(!h.a)return F;h.a=F;
 if(A[0]){A.pop();if(!A[0])L('unbind');}
 if(h.c.toTop&&h.o)$('#jqmP'+h.w[0]._jqm).after(h.w).remove();
 if(h.c.onHide)h.c.onHide(h);else{h.w.hide();if(h.o)h.o.remove();} return F;
},
params:{}};
var s=0,H=$.jqm.hash,A=[],ie6=$.browser.msie&&($.browser.version == "6.0"),F=false,
i=$('<iframe src="javascript:false;document.write(\'\');" class="jqm"></iframe>').css({opacity:0}),
e=function(h){if(ie6)if(h.o)h.o.html('<p style="width:100%;height:100%"/>').prepend(i);else if(!$('iframe.jqm',h.w)[0])h.w.prepend(i); f(h);},
f=function(h){try{$(':input:visible',h.w)[0].focus();}catch(_){}},
L=function(t){$()[t]("keypress",m)[t]("keydown",m)[t]("mousedown",m);},
m=function(e){var h=H[A[A.length-1]],r=(!$(e.target).parents('.jqmID'+h.s)[0]);if(r)f(h);return !r;},
hs=function(w,t,c){return w.each(function(){var s=this._jqm;$(t).each(function() {
 if(!this[c]){this[c]=[];$(this).click(function(){for(var i in {jqmShow:1,jqmHide:1})for(var s in this[i])if(H[this[i][s]])H[this[i][s]].w[i](this);return F;});}this[c].push(s);});});};
})(jQuery);/*
 * jPicker 1.1.6
 *
 * jQuery Plugin for Photoshop style color picker
 *
 * Copyright (c) 2010 Christopher T. Tillman
 * Digital Magic Productions, Inc. (http://www.digitalmagicpro.com/)
 * MIT style license, FREE to use, alter, copy, sell, and especially ENHANCE
 *
 * Painstakingly ported from John Dyers' excellent work on his own color picker based on the Prototype framework.
 *
 * John Dyers' website: (http://johndyer.name)
 * Color Picker page:   (http://johndyer.name/post/2007/09/PhotoShop-like-JavaScript-Color-Picker.aspx)
 *
 */
(function($, version)
{
  Math.precision = function(value, precision)
    {
      if (precision === undefined) precision = 0;
      return Math.round(value * Math.pow(10, precision)) / Math.pow(10, precision);
    };
  var Slider = // encapsulate slider functionality for the ColorMap and ColorBar - could be useful to use a jQuery UI draggable for this with certain extensions
      function(bar, options)
      {
        var $this = this, // private properties, methods, and events - keep these variables and classes invisible to outside code
          arrow = bar.find('img:first'), // the arrow image to drag
          minX = 0,
          maxX = 100,
          rangeX = 100,
          minY = 0,
          maxY = 100,
          rangeY = 100,
          x = 0,
          y = 0,
          offset,
          timeout,
          changeEvents = new Array(),
          fireChangeEvents =
            function(context)
            {
              for (var i = 0; i < changeEvents.length; i++) changeEvents[i].call($this, $this, context);
            },
          mouseDown = // bind the mousedown to the bar not the arrow for quick snapping to the clicked location
            function(e)
            {
              var off = bar.offset();
              offset = { l: off.left | 0, t: off.top | 0 };
              clearTimeout(timeout);
              timeout = setTimeout( // using setTimeout for visual updates - once the style is updated the browser will re-render internally allowing the next Javascript to run
                function()
                {
                  setValuesFromMousePosition.call($this, e);
                }, 0);
              // Bind mousemove and mouseup event to the document so it responds when dragged of of the bar - we will unbind these when on mouseup to save processing
              $(document).bind('mousemove', mouseMove).bind('mouseup', mouseUp);
              e.preventDefault(); // don't try to select anything or drag the image to the desktop
            },
          mouseMove = // set the values as the mouse moves
            function(e)
            {
              clearTimeout(timeout);
              timeout = setTimeout(
                function()
                {
                  setValuesFromMousePosition.call($this, e);
                }, 0);
              e.stopPropagation();
              e.preventDefault();
              return false;
            },
          mouseUp = // unbind the document events - they aren't needed when not dragging
            function(e)
            {
              $(document).unbind('mouseup', mouseUp).unbind('mousemove', mouseMove);
              e.stopPropagation();
              e.preventDefault();
              return false;
            },
          setValuesFromMousePosition = // calculate mouse position and set value within the current range
            function(e)
            {
              var locX = e.pageX - offset.l,
                  locY = e.pageY - offset.t,
                  barW = bar.w, // local copies for YUI compressor
                  barH = bar.h;
              // keep the arrow within the bounds of the bar
              if (locX < 0) locX = 0;
              else if (locX > barW) locX = barW;
              if (locY < 0) locY = 0;
              else if (locY > barH) locY = barH;
              val.call($this, 'xy', { x: ((locX / barW) * rangeX) + minX, y: ((locY / barH) * rangeY) + minY });
            },
          draw =
            function()
            {
              var arrowOffsetX = 0,
                arrowOffsetY = 0,
                barW = bar.w,
                barH = bar.h,
                arrowW = arrow.w,
                arrowH = arrow.h;
              setTimeout(
                function()
                {
                  if (rangeX > 0) // range is greater than zero
                  {
                    // constrain to bounds
                    if (x == maxX) arrowOffsetX = barW;
                    else arrowOffsetX = ((x / rangeX) * barW) | 0;
                  }
                  if (rangeY > 0) // range is greater than zero
                  {
                    // constrain to bounds
                    if (y == maxY) arrowOffsetY = barH;
                    else arrowOffsetY = ((y / rangeY) * barH) | 0;
                  }
                  // if arrow width is greater than bar width, center arrow and prevent horizontal dragging
                  if (arrowW >= barW) arrowOffsetX = (barW >> 1) - (arrowW >> 1); // number >> 1 - superfast bitwise divide by two and truncate (move bits over one bit discarding lowest)
                  else arrowOffsetX -= arrowW >> 1;
                  // if arrow height is greater than bar height, center arrow and prevent vertical dragging
                  if (arrowH >= barH) arrowOffsetY = (barH >> 1) - (arrowH >> 1);
                  else arrowOffsetY -= arrowH >> 1;
                  // set the arrow position based on these offsets
                  arrow.css({ left: arrowOffsetX + 'px', top: arrowOffsetY + 'px' });
                }, 0);
            },
          val =
            function(name, value, context)
            {
              var set = value !== undefined;
              if (!set)
              {
                if (name === undefined || name == null) name = 'xy';
                switch (name.toLowerCase())
                {
                  case 'x': return x;
                  case 'y': return y;
                  case 'xy':
                  default: return { x: x, y: y };
                }
              }
              if (context != null && context == $this) return;
              var changed = false,
                  newX,
                  newY;
              if (name == null) name = 'xy';
              switch (name.toLowerCase())
              {
                case 'x':
                  newX = value && (value.x && value.x | 0 || value | 0) || 0;
                  break;
                case 'y':
                  newY = value && (value.y && value.y | 0 || value | 0) || 0;
                  break;
                case 'xy':
                default:
                  newX = value && value.x && value.x | 0 || 0;
                  newY = value && value.y && value.y | 0 || 0;
                  break;
              }
              if (newX != null)
              {
                if (newX < minX) newX = minX;
                else if (newX > maxX) newX = maxX;
                if (x != newX)
                {
                  x = newX;
                  changed = true;
                }
              }
              if (newY != null)
              {
                if (newY < minY) newY = minY;
                else if (newY > maxY) newY = maxY;
                if (y != newY)
                {
                  y = newY;
                  changed = true;
                }
              }
              changed && fireChangeEvents.call($this, context || $this);
            },
          range =
            function (name, value)
            {
              var set = value !== undefined;
              if (!set)
              {
                if (name === undefined || name == null) name = 'all';
                switch (name.toLowerCase())
                {
                  case 'minx': return minX;
                  case 'maxx': return maxX;
                  case 'rangex': return { minX: minX, maxX: maxX, rangeX: rangeX };
                  case 'miny': return minY;
                  case 'maxy': return maxY;
                  case 'rangey': return { minY: minY, maxY: maxY, rangeY: rangeY };
                  case 'all':
                  default: return { minX: minX, maxX: maxX, rangeX: rangeX, minY: minY, maxY: maxY, rangeY: rangeY };
                }
              }
              var changed = false,
                  newMinX,
                  newMaxX,
                  newMinY,
                  newMaxY;
              if (name == null) name = 'all';
              switch (name.toLowerCase())
              {
                case 'minx':
                  newMinX = value && (value.minX && value.minX | 0 || value | 0) || 0;
                  break;
                case 'maxx':
                  newMaxX = value && (value.maxX && value.maxX | 0 || value | 0) || 0;
                  break;
                case 'rangex':
                  newMinX = value && value.minX && value.minX | 0 || 0;
                  newMaxX = value && value.maxX && value.maxX | 0 || 0;
                  break;
                case 'miny':
                  newMinY = value && (value.minY && value.minY | 0 || value | 0) || 0;
                  break;
                case 'maxy':
                  newMaxY = value && (value.maxY && value.maxY | 0 || value | 0) || 0;
                  break;
                case 'rangey':
                  newMinY = value && value.minY && value.minY | 0 || 0;
                  newMaxY = value && value.maxY && value.maxY | 0 || 0;
                  break;
                case 'all':
                default:
                  newMinX = value && value.minX && value.minX | 0 || 0;
                  newMaxX = value && value.maxX && value.maxX | 0 || 0;
                  newMinY = value && value.minY && value.minY | 0 || 0;
                  newMaxY = value && value.maxY && value.maxY | 0 || 0;
                  break;
              }
              if (newMinX != null && minX != newMinX)
              {
                minX = newMinX;
                rangeX = maxX - minX;
              }
              if (newMaxX != null && maxX != newMaxX)
              {
                maxX = newMaxX;
                rangeX = maxX - minX;
              }
              if (newMinY != null && minY != newMinY)
              {
                minY = newMinY;
                rangeY = maxY - minY;
              }
              if (newMaxY != null && maxY != newMaxY)
              {
                maxY = newMaxY;
                rangeY = maxY - minY;
              }
            },
          bind =
            function (callback)
            {
              if ($.isFunction(callback)) changeEvents.push(callback);
            },
          unbind =
            function (callback)
            {
              if (!$.isFunction(callback)) return;
              var i;
              while ((i = $.inArray(callback, changeEvents)) != -1) changeEvents.splice(i, 1);
            },
          destroy =
            function()
            {
              // unbind all possible events and null objects
              $(document).unbind('mouseup', mouseUp).unbind('mousemove', mouseMove);
              bar.unbind('mousedown', mouseDown);
              bar = null;
              arrow = null;
              changeEvents = null;
            };
        $.extend(true, $this, // public properties, methods, and event bindings - these we need to access from other controls
          {
            val: val,
            range: range,
            bind: bind,
            unbind: unbind,
            destroy: destroy
          });
        // initialize this control
        arrow.src = options.arrow && options.arrow.image;
        arrow.w = options.arrow && options.arrow.width || arrow.width();
        arrow.h = options.arrow && options.arrow.height || arrow.height();
        bar.w = options.map && options.map.width || bar.width();
        bar.h = options.map && options.map.height || bar.height();
        // bind mousedown event
        bar.bind('mousedown', mouseDown);
        bind.call($this, draw);
      },
    ColorValuePicker = // controls for all the input elements for the typing in color values
      function(picker, color, bindedHex, alphaPrecision)
      {
        var $this = this, // private properties and methods
          inputs = picker.find('td.Text input'),
          red = inputs.eq(3),
          green = inputs.eq(4),
          blue = inputs.eq(5),
          alpha = inputs.length > 7 ? inputs.eq(6) : null,
          hue = inputs.eq(0),
          saturation = inputs.eq(1),
          value = inputs.eq(2),
          hex = inputs.eq(inputs.length > 7 ? 7 : 6),
          ahex = inputs.length > 7 ? inputs.eq(8) : null,
          keyDown = // input box key down - use arrows to alter color
            function(e)
            {
              if (e.target.value == '' && e.target != hex.get(0) && (bindedHex != null && e.target != bindedHex.get(0) || bindedHex == null)) return;
              if (!validateKey(e)) return e;
              switch (e.target)
              {
                case red.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      red.val(setValueInRange.call($this, (red.val() << 0) + 1, 0, 255));
                      color.val('r', red.val(), e.target);
                      return false;
                    case 40:
                      red.val(setValueInRange.call($this, (red.val() << 0) - 1, 0, 255));
                      color.val('r', red.val(), e.target);
                      return false;
                  }
                  break;
                case green.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      green.val(setValueInRange.call($this, (green.val() << 0) + 1, 0, 255));
                      color.val('g', green.val(), e.target);
                      return false;
                    case 40:
                      green.val(setValueInRange.call($this, (green.val() << 0) - 1, 0, 255));
                      color.val('g', green.val(), e.target);
                      return false;
                  }
                  break;
                case blue.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      blue.val(setValueInRange.call($this, (blue.val() << 0) + 1, 0, 255));
                      color.val('b', blue.val(), e.target);
                      return false;
                    case 40:
                      blue.val(setValueInRange.call($this, (blue.val() << 0) - 1, 0, 255));
                      color.val('b', blue.val(), e.target);
                      return false;
                  }
                  break;
                case alpha && alpha.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      alpha.val(setValueInRange.call($this, parseFloat(alpha.val()) + 1, 0, 100));
                      color.val('a', Math.precision((alpha.val() * 255) / 100, alphaPrecision), e.target);
                      return false;
                    case 40:
                      alpha.val(setValueInRange.call($this, parseFloat(alpha.val()) - 1, 0, 100));
                      color.val('a', Math.precision((alpha.val() * 255) / 100, alphaPrecision), e.target);
                      return false;
                  }
                  break;
                case hue.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      hue.val(setValueInRange.call($this, (hue.val() << 0) + 1, 0, 360));
                      color.val('h', hue.val(), e.target);
                      return false;
                    case 40:
                      hue.val(setValueInRange.call($this, (hue.val() << 0) - 1, 0, 360));
                      color.val('h', hue.val(), e.target);
                      return false;
                  }
                  break;
                case saturation.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      saturation.val(setValueInRange.call($this, (saturation.val() << 0) + 1, 0, 100));
                      color.val('s', saturation.val(), e.target);
                      return false;
                    case 40:
                      saturation.val(setValueInRange.call($this, (saturation.val() << 0) - 1, 0, 100));
                      color.val('s', saturation.val(), e.target);
                      return false;
                  }
                  break;
                case value.get(0):
                  switch (e.keyCode)
                  {
                    case 38:
                      value.val(setValueInRange.call($this, (value.val() << 0) + 1, 0, 100));
                      color.val('v', value.val(), e.target);
                      return false;
                    case 40:
                      value.val(setValueInRange.call($this, (value.val() << 0) - 1, 0, 100));
                      color.val('v', value.val(), e.target);
                      return false;
                  }
                  break;
              }
            },
          keyUp = // input box key up - validate value and set color
            function(e)
            {
              if (e.target.value == '' && e.target != hex.get(0) && (bindedHex != null && e.target != bindedHex.get(0) || bindedHex == null)) return;
              if (!validateKey(e)) return e;
              switch (e.target)
              {
                case red.get(0):
                  red.val(setValueInRange.call($this, red.val(), 0, 255));
                  color.val('r', red.val(), e.target);
                  break;
                case green.get(0):
                  green.val(setValueInRange.call($this, green.val(), 0, 255));
                  color.val('g', green.val(), e.target);
                  break;
                case blue.get(0):
                  blue.val(setValueInRange.call($this, blue.val(), 0, 255));
                  color.val('b', blue.val(), e.target);
                  break;
                case alpha && alpha.get(0):
                  alpha.val(setValueInRange.call($this, alpha.val(), 0, 100));
                  color.val('a', Math.precision((alpha.val() * 255) / 100, alphaPrecision), e.target);
                  break;
                case hue.get(0):
                  hue.val(setValueInRange.call($this, hue.val(), 0, 360));
                  color.val('h', hue.val(), e.target);
                  break;
                case saturation.get(0):
                  saturation.val(setValueInRange.call($this, saturation.val(), 0, 100));
                  color.val('s', saturation.val(), e.target);
                  break;
                case value.get(0):
                  value.val(setValueInRange.call($this, value.val(), 0, 100));
                  color.val('v', value.val(), e.target);
                  break;
                case hex.get(0):
                  hex.val(hex.val().replace(/[^a-fA-F0-9]/g, '').toLowerCase().substring(0, 6));
                  bindedHex && bindedHex.val(hex.val());
                  color.val('hex', hex.val() != '' ? hex.val() : null, e.target);
                  break;
                case bindedHex && bindedHex.get(0):
                  bindedHex.val(bindedHex.val().replace(/[^a-fA-F0-9]/g, '').toLowerCase().substring(0, 6));
                  hex.val(bindedHex.val());
                  color.val('hex', bindedHex.val() != '' ? bindedHex.val() : null, e.target);
                  break;
                case ahex && ahex.get(0):
                  ahex.val(ahex.val().replace(/[^a-fA-F0-9]/g, '').toLowerCase().substring(0, 2));
                  color.val('a', ahex.val() != null ? parseInt(ahex.val(), 16) : null, e.target);
                  break;
              }
            },
          blur = // input box blur - reset to original if value empty
            function(e)
            {
              if (color.val() != null)
              {
                switch (e.target)
                {
                  case red.get(0): red.val(color.val('r')); break;
                  case green.get(0): green.val(color.val('g')); break;
                  case blue.get(0): blue.val(color.val('b')); break;
                  case alpha && alpha.get(0): alpha.val(Math.precision((color.val('a') * 100) / 255, alphaPrecision)); break;
                  case hue.get(0): hue.val(color.val('h')); break;
                  case saturation.get(0): saturation.val(color.val('s')); break;
                  case value.get(0): value.val(color.val('v')); break;
                  case hex.get(0):
                  case bindedHex && bindedHex.get(0):
                    hex.val(color.val('hex'));
                    bindedHex && bindedHex.val(color.val('hex'));
                    break;
                  case ahex && ahex.get(0): ahex.val(color.val('ahex').substring(6)); break;
                }
              }
            },
          validateKey = // validate key
            function(e)
            {
              switch(e.keyCode)
              {
                case 9:
                case 16:
                case 29:
                case 37:
                case 39:
                  return false;
                case 'c'.charCodeAt():
                case 'v'.charCodeAt():
                  if (e.ctrlKey) return false;
              }
              return true;
            },
          setValueInRange = // constrain value within range
            function(value, min, max)
            {
              if (value == '' || isNaN(value)) return min;
              if (value > max) return max;
              if (value < min) return min;
              return value;
            },
          colorChanged =
            function(ui, context)
            {
              var all = ui.val('all');
              if (context != red.get(0)) red.val(all != null ? all.r : '');
              if (context != green.get(0)) green.val(all != null ? all.g : '');
              if (context != blue.get(0)) blue.val(all != null ? all.b : '');
              if (alpha && context != alpha.get(0)) alpha.val(all != null ? Math.precision((all.a * 100) / 255, alphaPrecision) : '');
              if (context != hue.get(0)) hue.val(all != null ? all.h : '');
              if (context != saturation.get(0)) saturation.val(all != null ? all.s : '');
              if (context != value.get(0)) value.val(all != null ? all.v : '');
              if (context != hex.get(0) && (bindedHex && context != bindedHex.get(0) || !bindedHex)) hex.val(all != null ? all.hex : '');
              if (bindedHex && context != bindedHex.get(0) && context != hex.get(0)) bindedHex.val(all != null ? all.hex : '');
              if (ahex && context != ahex.get(0)) ahex.val(all != null ? all.ahex.substring(6) : '');
            },
          destroy =
            function()
            {
              // unbind all events and null objects
              red.add(green).add(blue).add(alpha).add(hue).add(saturation).add(value).add(hex).add(bindedHex).add(ahex).unbind('keyup', keyUp).unbind('blur', blur);
              red.add(green).add(blue).add(alpha).add(hue).add(saturation).add(value).unbind('keydown', keyDown);
              color.unbind(colorChanged);
              red = null;
              green = null;
              blue = null;
              alpha = null;
              hue = null;
              saturation = null;
              value = null;
              hex = null;
              ahex = null;
            };
        $.extend(true, $this, // public properties and methods
          {
            destroy: destroy
          });
        red.add(green).add(blue).add(alpha).add(hue).add(saturation).add(value).add(hex).add(bindedHex).add(ahex).bind('keyup', keyUp).bind('blur', blur);
        red.add(green).add(blue).add(alpha).add(hue).add(saturation).add(value).bind('keydown', keyDown);
        color.bind(colorChanged);
      };
  $.jPicker =
    {
      List: [], // array holding references to each active instance of the control
      Color: // color object - we will be able to assign by any color space type or retrieve any color space info
             // we want this public so we can optionally assign new color objects to initial values using inputs other than a string hex value (also supported)
        function(init)
        {
          var $this = this,
            r,
            g,
            b,
            a,
            h,
            s,
            v,
            changeEvents = new Array(),
            fireChangeEvents = 
              function(context)
              {
                for (var i = 0; i < changeEvents.length; i++) changeEvents[i].call($this, $this, context);
              },
            val =
              function(name, value, context)
              {
                var set = value !== undefined;
                if (!set)
                {
                  if (name === undefined || name == null || name == '') name = 'all';
                  if (r == null) return null;
                  switch (name.toLowerCase())
                  {
                    case 'ahex': return ColorMethods.rgbaToHex({ r: r, g: g, b: b, a: a });
                    case 'hex': return val('ahex').substring(0, 6);
                    case 'all': return { r: r, g: g, b: b, a: a, h: h, s: s, v: v, hex: val.call($this, 'hex'), ahex: val.call($this, 'ahex') };
                    default:
                      var ret={};
                      for (var i = 0; i < name.length; i++)
                      {
                        switch (name.charAt(i))
                        {
                          case 'r':
                            if (name.length == 1) ret = r;
                            else ret.r = r;
                            break;
                          case 'g':
                            if (name.length == 1) ret = g;
                            else ret.g = g;
                            break;
                          case 'b':
                            if (name.length == 1) ret = b;
                            else ret.b = b;
                            break;
                          case 'a':
                            if (name.length == 1) ret = a;
                            else ret.a = a;
                            break;
                          case 'h':
                            if (name.length == 1) ret = h;
                            else ret.h = h;
                            break;
                          case 's':
                            if (name.length == 1) ret = s;
                            else ret.s = s;
                            break;
                          case 'v':
                            if (name.length == 1) ret = v;
                            else ret.v = v;
                            break;
                        }
                      }
                      return ret == {} ? val.call($this, 'all') : ret;
                      break;
                  }
                }
                if (context != null && context == $this) return;
                var changed = false;
                if (name == null) name = '';
                if (value == null)
                {
                  if (r != null)
                  {
                    r = null;
                    changed = true;
                  }
                  if (g != null)
                  {
                    g = null;
                    changed = true;
                  }
                  if (b != null)
                  {
                    b = null;
                    changed = true;
                  }
                  if (a != null)
                  {
                    a = null;
                    changed = true;
                  }
                  if (h != null)
                  {
                    h = null;
                    changed = true;
                  }
                  if (s != null)
                  {
                    s = null;
                    changed = true;
                  }
                  if (v != null)
                  {
                    v = null;
                    changed = true;
                  }
                  changed && fireChangeEvents.call($this, context || $this);
                  return;
                }
                switch (name.toLowerCase())
                {
                  case 'ahex':
                  case 'hex':
                    var ret = ColorMethods.hexToRgba(value && (value.ahex || value.hex) || value || '00000000');
                    val.call($this, 'rgba', { r: ret.r, g: ret.g, b: ret.b, a: name == 'ahex' ? ret.a : a != null ? a : 255 }, context);
                    break;
                  default:
                    if (value && (value.ahex != null || value.hex != null))
                    {
                      val.call($this, 'ahex', value.ahex || value.hex || '00000000', context);
                      return;
                    }
                    var newV = {}, rgb = false, hsv = false;
                    if (value.r !== undefined && !name.indexOf('r') == -1) name += 'r';
                    if (value.g !== undefined && !name.indexOf('g') == -1) name += 'g';
                    if (value.b !== undefined && !name.indexOf('b') == -1) name += 'b';
                    if (value.a !== undefined && !name.indexOf('a') == -1) name += 'a';
                    if (value.h !== undefined && !name.indexOf('h') == -1) name += 'h';
                    if (value.s !== undefined && !name.indexOf('s') == -1) name += 's';
                    if (value.v !== undefined && !name.indexOf('v') == -1) name += 'v';
                    for (var i = 0; i < name.length; i++)
                    {
                      switch (name.charAt(i))
                      {
                        case 'r':
                          if (hsv) continue;
                          rgb = true;
                          newV.r = value && value.r && value.r | 0 || value && value | 0 || 0;
                          if (newV.r < 0) newV.r = 0;
                          else if (newV.r > 255) newV.r = 255;
                          if (r != newV.r)
                          {
                            r = newV.r;
                            changed = true;
                          }
                          break;
                        case 'g':
                          if (hsv) continue;
                          rgb = true;
                          newV.g = value && value.g && value.g | 0 || value && value | 0 || 0;
                          if (newV.g < 0) newV.g = 0;
                          else if (newV.g > 255) newV.g = 255;
                          if (g != newV.g)
                          {
                            g = newV.g;
                            changed = true;
                          }
                          break;
                        case 'b':
                          if (hsv) continue;
                          rgb = true;
                          newV.b = value && value.b && value.b | 0 || value && value | 0 || 0;
                          if (newV.b < 0) newV.b = 0;
                          else if (newV.b > 255) newV.b = 255;
                          if (b != newV.b)
                          {
                            b = newV.b;
                            changed = true;
                          }
                          break;
                        case 'a':
                          newV.a = value && value.a != null ? value.a | 0 : value != null ? value | 0 : 255;
                          if (newV.a < 0) newV.a = 0;
                          else if (newV.a > 255) newV.a = 255;
                          if (a != newV.a)
                          {
                            a = newV.a;
                            changed = true;
                          }
                          break;
                        case 'h':
                          if (rgb) continue;
                          hsv = true;
                          newV.h = value && value.h && value.h | 0 || value && value | 0 || 0;
                          if (newV.h < 0) newV.h = 0;
                          else if (newV.h > 360) newV.h = 360;
                          if (h != newV.h)
                          {
                            h = newV.h;
                            changed = true;
                          }
                          break;
                        case 's':
                          if (rgb) continue;
                          hsv = true;
                          newV.s = value && value.s != null ? value.s | 0 : value != null ? value | 0 : 100;
                          if (newV.s < 0) newV.s = 0;
                          else if (newV.s > 100) newV.s = 100;
                          if (s != newV.s)
                          {
                            s = newV.s;
                            changed = true;
                          }
                          break;
                        case 'v':
                          if (rgb) continue;
                          hsv = true;
                          newV.v = value && value.v != null ? value.v | 0 : value != null ? value | 0 : 100;
                          if (newV.v < 0) newV.v = 0;
                          else if (newV.v > 100) newV.v = 100;
                          if (v != newV.v)
                          {
                            v = newV.v;
                            changed = true;
                          }
                          break;
                      }
                    }
                    if (changed)
                    {
                      if (rgb)
                      {
                        r = r || 0;
                        g = g || 0;
                        b = b || 0;
                        var ret = ColorMethods.rgbToHsv({ r: r, g: g, b: b });
                        h = ret.h;
                        s = ret.s;
                        v = ret.v;
                      }
                      else if (hsv)
                      {
                        h = h || 0;
                        s = s != null ? s : 100;
                        v = v != null ? v : 100;
                        var ret = ColorMethods.hsvToRgb({ h: h, s: s, v: v });
                        r = ret.r;
                        g = ret.g;
                        b = ret.b;
                      }
                      a = a != null ? a : 255;
                      fireChangeEvents.call($this, context || $this);
                    }
                    break;
                }
              },
            bind =
              function(callback)
              {
                if ($.isFunction(callback)) changeEvents.push(callback);
              },
            unbind =
              function(callback)
              {
                if (!$.isFunction(callback)) return;
                var i;
                while ((i = $.inArray(callback, changeEvents)) != -1) changeEvents.splice(i, 1);
              },
            destroy =
              function()
              {
                changeEvents = null;
              }
          $.extend(true, $this, // public properties and methods
            {
              val: val,
              bind: bind,
              unbind: unbind,
              destroy: destroy
            });
          if (init)
          {
            if (init.ahex != null) val('ahex', init);
            else if (init.hex != null) val((init.a != null ? 'a' : '') + 'hex', init.a != null ? { ahex: init.hex + ColorMethods.intToHex(init.a) } : init);
            else if (init.r != null && init.g != null && init.b != null) val('rgb' + (init.a != null ? 'a' : ''), init);
            else if (init.h != null && init.s != null && init.v != null) val('hsv' + (init.a != null ? 'a' : ''), init);
          }
        },
      ColorMethods: // color conversion methods  - make public to give use to external scripts
        {
          hexToRgba:
            function(hex)
            {
              hex = this.validateHex(hex);
              if (hex == '') return { r: null, g: null, b: null, a: null };
              var r = '00', g = '00', b = '00', a = '255';
              if (hex.length == 6) hex += 'ff';
              if (hex.length > 6)
              {
                r = hex.substring(0, 2);
                g = hex.substring(2, 4);
                b = hex.substring(4, 6);
                a = hex.substring(6, hex.length);
              }
              else
              {
                if (hex.length > 4)
                {
                  r = hex.substring(4, hex.length);
                  hex = hex.substring(0, 4);
                }
                if (hex.length > 2)
                {
                  g = hex.substring(2, hex.length);
                  hex = hex.substring(0, 2);
                }
                if (hex.length > 0) b = hex.substring(0, hex.length);
              }
              return { r: this.hexToInt(r), g: this.hexToInt(g), b: this.hexToInt(b), a: this.hexToInt(a) };
            },
          validateHex:
            function(hex)
            {
              hex = hex.toLowerCase().replace(/[^a-f0-9]/g, '');
              if (hex.length > 8) hex = hex.substring(0, 8);
              return hex;
            },
          rgbaToHex:
            function(rgba)
            {
              return this.intToHex(rgba.r) + this.intToHex(rgba.g) + this.intToHex(rgba.b) + this.intToHex(rgba.a);
            },
          intToHex:
            function(dec)
            {
              var result = (dec | 0).toString(16);
              if (result.length == 1) result = ('0' + result);
              return result.toLowerCase();
            },
          hexToInt:
            function(hex)
            {
              return parseInt(hex, 16);
            },
          rgbToHsv:
            function(rgb)
            {
              var r = rgb.r / 255, g = rgb.g / 255, b = rgb.b / 255, hsv = { h: 0, s: 0, v: 0 }, min = 0, max = 0, delta;
              if (r >= g && r >= b)
              {
                max = r;
                min = g > b ? b : g;
              }
              else if (g >= b && g >= r)
              {
                max = g;
                min = r > b ? b : r;
              }
              else
              {
                max = b;
                min = g > r ? r : g;
              }
              hsv.v = max;
              hsv.s = max ? (max - min) / max : 0;
              if (!hsv.s) hsv.h = 0;
              else
              {
                delta = max - min;
                if (r == max) hsv.h = (g - b) / delta;
                else if (g == max) hsv.h = 2 + (b - r) / delta;
                else hsv.h = 4 + (r - g) / delta;
                hsv.h = parseInt(hsv.h * 60);
                if (hsv.h < 0) hsv.h += 360;
              }
              hsv.s = (hsv.s * 100) | 0;
              hsv.v = (hsv.v * 100) | 0;
              return hsv;
            },
          hsvToRgb:
            function(hsv)
            {
              var rgb = { r: 0, g: 0, b: 0, a: 100 }, h = hsv.h, s = hsv.s, v = hsv.v;
              if (s == 0)
              {
                if (v == 0) rgb.r = rgb.g = rgb.b = 0;
                else rgb.r = rgb.g = rgb.b = (v * 255 / 100) | 0;
              }
              else
              {
                if (h == 360) h = 0;
                h /= 60;
                s = s / 100;
                v = v / 100;
                var i = h | 0,
                    f = h - i,
                    p = v * (1 - s),
                    q = v * (1 - (s * f)),
                    t = v * (1 - (s * (1 - f)));
                switch (i)
                {
                  case 0:
                    rgb.r = v;
                    rgb.g = t;
                    rgb.b = p;
                    break;
                  case 1:
                    rgb.r = q;
                    rgb.g = v;
                    rgb.b = p;
                    break;
                  case 2:
                    rgb.r = p;
                    rgb.g = v;
                    rgb.b = t;
                    break;
                  case 3:
                    rgb.r = p;
                    rgb.g = q;
                    rgb.b = v;
                    break;
                  case 4:
                    rgb.r = t;
                    rgb.g = p;
                    rgb.b = v;
                    break;
                  case 5:
                    rgb.r = v;
                    rgb.g = p;
                    rgb.b = q;
                    break;
                }
                rgb.r = (rgb.r * 255) | 0;
                rgb.g = (rgb.g * 255) | 0;
                rgb.b = (rgb.b * 255) | 0;
              }
              return rgb;
            }
        }
    };
  var Color = $.jPicker.Color, List = $.jPicker.List, ColorMethods = $.jPicker.ColorMethods; // local copies for YUI compressor
  $.fn.jPicker =
    function(options)
    {
      var $arguments = arguments;
      return this.each(
        function()
        {
          var $this = this, settings = $.extend(true, {}, $.fn.jPicker.defaults, options); // local copies for YUI compressor
          if ($($this).get(0).nodeName.toLowerCase() == 'input') // Add color picker icon if binding to an input element and bind the events to the input
          {
            $.extend(true, settings,
              {
                window:
                {
                  bindToInput: true,
                  expandable: true,
                  input: $($this)
                }
              });

            if($($this).val()=='')

            {

              settings.color.active = new Color({ hex: null });

              settings.color.current = new Color({ hex: null });

            }

            else if (ColorMethods.validateHex($($this).val()))

            {

              settings.color.active = new Color({ hex: $($this).val(), a: settings.color.active.val('a') });

              settings.color.current = new Color({ hex: $($this).val(), a: settings.color.active.val('a') });

            }
          }
          if (settings.window.expandable)
            $($this).after('<span class="jPicker"><span class="Icon"><span class="Color">&nbsp;</span><span class="Alpha">&nbsp;</span><span class="Image" title="Click To Open Color Picker">&nbsp;</span><span class="Container">&nbsp;</span></span></span>');
          else settings.window.liveUpdate = false; // Basic control binding for inline use - You will need to override the liveCallback or commitCallback function to retrieve results
          var isLessThanIE7 = parseFloat(navigator.appVersion.split('MSIE')[1]) < 7 && document.body.filters, // needed to run the AlphaImageLoader function for IE6
            container = null,
            colorMapDiv = null,
            colorBarDiv = null,
            colorMapL1 = null, // different layers of colorMap and colorBar
            colorMapL2 = null,
            colorMapL3 = null,
            colorBarL1 = null,
            colorBarL2 = null,
            colorBarL3 = null,
            colorBarL4 = null,
            colorBarL5 = null,
            colorBarL6 = null,
            colorMap = null, // color maps
            colorBar = null,
            colorPicker = null,
            elementStartX = null, // Used to record the starting css positions for dragging the control
            elementStartY = null,
            pageStartX = null, // Used to record the mousedown coordinates for dragging the control
            pageStartY = null,
            activePreview = null, // color boxes above the radio buttons
            currentPreview = null,
            okButton = null,
            cancelButton = null,
            grid = null, // preset colors grid
            iconColor = null, // iconColor for popup icon
            iconAlpha = null, // iconAlpha for popup icon
            iconImage = null, // iconImage popup icon
            moveBar = null, // drag bar
            setColorMode = // set color mode and update visuals for the new color mode
              function(colorMode)
              {
                var active = color.active, // local copies for YUI compressor
                  clientPath = images.clientPath,
                  hex = active.val('hex'),
                  rgbMap,
                  rgbBar;
                settings.color.mode = colorMode;
                switch (colorMode)
                {
                  case 'h':
                    setTimeout(
                      function()
                      {
                        setBG.call($this, colorMapDiv, 'transparent');
                        setImgLoc.call($this, colorMapL1, 0);
                        setAlpha.call($this, colorMapL1, 100);
                        setImgLoc.call($this, colorMapL2, 260);
                        setAlpha.call($this, colorMapL2, 100);
                        setBG.call($this, colorBarDiv, 'transparent');
                        setImgLoc.call($this, colorBarL1, 0);
                        setAlpha.call($this, colorBarL1, 100);
                        setImgLoc.call($this, colorBarL2, 260);
                        setAlpha.call($this, colorBarL2, 100);
                        setImgLoc.call($this, colorBarL3, 260);
                        setAlpha.call($this, colorBarL3, 100);
                        setImgLoc.call($this, colorBarL4, 260);
                        setAlpha.call($this, colorBarL4, 100);
                        setImgLoc.call($this, colorBarL6, 260);
                        setAlpha.call($this, colorBarL6, 100);
                      }, 0);
                    colorMap.range('all', { minX: 0, maxX: 100, minY: 0, maxY: 100 });
                    colorBar.range('rangeY', { minY: 0, maxY: 360 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('s'), y: 100 - active.val('v') }, colorMap);
                    colorBar.val('y', 360 - active.val('h'), colorBar);
                    break;
                  case 's':
                    setTimeout(
                      function()
                      {
                        setBG.call($this, colorMapDiv, 'transparent');
                        setImgLoc.call($this, colorMapL1, -260);
                        setImgLoc.call($this, colorMapL2, -520);
                        setImgLoc.call($this, colorBarL1, -260);
                        setImgLoc.call($this, colorBarL2, -520);
                        setImgLoc.call($this, colorBarL6, 260);
                        setAlpha.call($this, colorBarL6, 100);
                      }, 0);
                    colorMap.range('all', { minX: 0, maxX: 360, minY: 0, maxY: 100 });
                    colorBar.range('rangeY', { minY: 0, maxY: 100 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('h'), y: 100 - active.val('v') }, colorMap);
                    colorBar.val('y', 100 - active.val('s'), colorBar);
                    break;
                  case 'v':
                    setTimeout(
                      function()
                      {
                        setBG.call($this, colorMapDiv, '000000');
                        setImgLoc.call($this, colorMapL1, -780);
                        setImgLoc.call($this, colorMapL2, 260);
                        setBG.call($this, colorBarDiv, hex);
                        setImgLoc.call($this, colorBarL1, -520);
                        setImgLoc.call($this, colorBarL2, 260);
                        setAlpha.call($this, colorBarL2, 100);
                        setImgLoc.call($this, colorBarL6, 260);
                        setAlpha.call($this, colorBarL6, 100);
                      }, 0);
                    colorMap.range('all', { minX: 0, maxX: 360, minY: 0, maxY: 100 });
                    colorBar.range('rangeY', { minY: 0, maxY: 100 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('h'), y: 100 - active.val('s') }, colorMap);
                    colorBar.val('y', 100 - active.val('v'), colorBar);
                    break;
                  case 'r':
                    rgbMap = -1040;
                    rgbBar = -780;
                    colorMap.range('all', { minX: 0, maxX: 255, minY: 0, maxY: 255 });
                    colorBar.range('rangeY', { minY: 0, maxY: 255 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('b'), y: 255 - active.val('g') }, colorMap);
                    colorBar.val('y', 255 - active.val('r'), colorBar);
                    break;
                  case 'g':
                    rgbMap = -1560;
                    rgbBar = -1820;
                    colorMap.range('all', { minX: 0, maxX: 255, minY: 0, maxY: 255 });
                    colorBar.range('rangeY', { minY: 0, maxY: 255 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('b'), y: 255 - active.val('r') }, colorMap);
                    colorBar.val('y', 255 - active.val('g'), colorBar);
                    break;
                  case 'b':
                    rgbMap = -2080;
                    rgbBar = -2860;
                    colorMap.range('all', { minX: 0, maxX: 255, minY: 0, maxY: 255 });
                    colorBar.range('rangeY', { minY: 0, maxY: 255 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('r'), y: 255 - active.val('g') }, colorMap);
                    colorBar.val('y', 255 - active.val('b'), colorBar);
                    break;
                  case 'a':
                    setTimeout(
                      function()
                      {
                        setBG.call($this, colorMapDiv, 'transparent');
                        setImgLoc.call($this, colorMapL1, -260);
                        setImgLoc.call($this, colorMapL2, -520);
                        setImgLoc.call($this, colorBarL1, 260);
                        setImgLoc.call($this, colorBarL2, 260);
                        setAlpha.call($this, colorBarL2, 100);
                        setImgLoc.call($this, colorBarL6, 0);
                        setAlpha.call($this, colorBarL6, 100);
                      }, 0);
                    colorMap.range('all', { minX: 0, maxX: 360, minY: 0, maxY: 100 });
                    colorBar.range('rangeY', { minY: 0, maxY: 255 });
                    if (active.val('ahex') == null) break;
                    colorMap.val('xy', { x: active.val('h'), y: 100 - active.val('v') }, colorMap);
                    colorBar.val('y', 255 - active.val('a'), colorBar);
                    break;
                  default:
                    throw ('Invalid Mode');
                    break;
                }
                switch (colorMode)
                {
                  case 'h':
                    break;
                  case 's':
                  case 'v':
                  case 'a':
                    setTimeout(
                      function()
                      {
                        setAlpha.call($this, colorMapL1, 100);
                        setAlpha.call($this, colorBarL1, 100);
                        setImgLoc.call($this, colorBarL3, 260);
                        setAlpha.call($this, colorBarL3, 100);
                        setImgLoc.call($this, colorBarL4, 260);
                        setAlpha.call($this, colorBarL4, 100);
                      }, 0);
                    break;
                  case 'r':
                  case 'g':
                  case 'b':
                    setTimeout(
                      function()
                      {
                        setBG.call($this, colorMapDiv, 'transparent');
                        setBG.call($this, colorBarDiv, 'transparent');
                        setAlpha.call($this, colorBarL1, 100);
                        setAlpha.call($this, colorMapL1, 100);
                        setImgLoc.call($this, colorMapL1, rgbMap);
                        setImgLoc.call($this, colorMapL2, rgbMap - 260);
                        setImgLoc.call($this, colorBarL1, rgbBar - 780);
                        setImgLoc.call($this, colorBarL2, rgbBar - 520);
                        setImgLoc.call($this, colorBarL3, rgbBar);
                        setImgLoc.call($this, colorBarL4, rgbBar - 260);
                        setImgLoc.call($this, colorBarL6, 260);
                        setAlpha.call($this, colorBarL6, 100);
                      }, 0);
                    break;
                }
                if (active.val('ahex') == null) return;
                activeColorChanged.call($this, active);
              },
            activeColorChanged = // Update color when user changes text values
              function(ui, context)
              {
                if (context == null || (context != colorBar && context != colorMap)) positionMapAndBarArrows.call($this, ui, context);
                setTimeout(
                  function()
                  {
                    updatePreview.call($this, ui);
                    updateMapVisuals.call($this, ui);
                    updateBarVisuals.call($this, ui);
                  }, 0);
              },
            mapValueChanged = // user has dragged the ColorMap pointer
              function(ui, context)
              {
                var active = color.active;
                if (context != colorMap && active.val() == null) return;
                var xy = ui.val('all');
                switch (settings.color.mode)
                {
                  case 'h':
                    active.val('sv', { s: xy.x, v: 100 - xy.y }, context);
                    break;
                  case 's':
                  case 'a':
                    active.val('hv', { h: xy.x, v: 100 - xy.y }, context);
                    break;
                  case 'v':
                    active.val('hs', { h: xy.x, s: 100 - xy.y }, context);
                    break;
                  case 'r':
                    active.val('gb', { g: 255 - xy.y, b: xy.x }, context);
                    break;
                  case 'g':
                    active.val('rb', { r: 255 - xy.y, b: xy.x }, context);
                    break;
                  case 'b':
                    active.val('rg', { r: xy.x, g: 255 - xy.y }, context);
                    break;
                }
              },
            colorBarValueChanged = // user has dragged the ColorBar slider
              function(ui, context)
              {
                var active = color.active;
                if (context != colorBar && active.val() == null) return;
                switch (settings.color.mode)
                {
                  case 'h':
                    active.val('h', { h: 360 - ui.val('y') }, context);
                    break;
                  case 's':
                    active.val('s', { s: 100 - ui.val('y') }, context);
                    break;
                  case 'v':
                    active.val('v', { v: 100 - ui.val('y') }, context);
                    break;
                  case 'r':
                    active.val('r', { r: 255 - ui.val('y') }, context);
                    break;
                  case 'g':
                    active.val('g', { g: 255 - ui.val('y') }, context);
                    break;
                  case 'b':
                    active.val('b', { b: 255 - ui.val('y') }, context);
                    break;
                  case 'a':
                    active.val('a', 255 - ui.val('y'), context);
                    break;
                }
              },
            positionMapAndBarArrows = // position map and bar arrows to match current color
              function(ui, context)
              {
                if (context != colorMap)
                {
                  switch (settings.color.mode)
                  {
                    case 'h':
                      var sv = ui.val('sv');
                      colorMap.val('xy', { x: sv != null ? sv.s : 100, y: 100 - (sv != null ? sv.v : 100) }, context);
                      break;
                    case 's':
                    case 'a':
                      var hv = ui.val('hv');
                      colorMap.val('xy', { x: hv && hv.h || 0, y: 100 - (hv != null ? hv.v : 100) }, context);
                      break;
                    case 'v':
                      var hs = ui.val('hs');
                      colorMap.val('xy', { x: hs && hs.h || 0, y: 100 - (hs != null ? hs.s : 100) }, context);
                      break;
                    case 'r':
                      var bg = ui.val('bg');
                      colorMap.val('xy', { x: bg && bg.b || 0, y: 255 - (bg && bg.g || 0) }, context);
                      break;
                    case 'g':
                      var br = ui.val('br');
                      colorMap.val('xy', { x: br && br.b || 0, y: 255 - (br && br.r || 0) }, context);
                      break;
                    case 'b':
                      var rg = ui.val('rg');
                      colorMap.val('xy', { x: rg && rg.r || 0, y: 255 - (rg && rg.g || 0) }, context);
                      break;
                  }
                }
                if (context != colorBar)
                {
                  switch (settings.color.mode)
                  {
                    case 'h':
                      colorBar.val('y', 360 - (ui.val('h') || 0), context);
                      break;
                    case 's':
                      var s = ui.val('s');
                      colorBar.val('y', 100 - (s != null ? s : 100), context);
                      break;
                    case 'v':
                      var v = ui.val('v');
                      colorBar.val('y', 100 - (v != null ? v : 100), context);
                      break;
                    case 'r':
                      colorBar.val('y', 255 - (ui.val('r') || 0), context);
                      break;
                    case 'g':
                      colorBar.val('y', 255 - (ui.val('g') || 0), context);
                      break;
                    case 'b':
                      colorBar.val('y', 255 - (ui.val('b') || 0), context);
                      break;
                    case 'a':
                      var a = ui.val('a');
                      colorBar.val('y', 255 - (a != null ? a : 255), context);
                      break;
                  }
                }
              },
            updatePreview =
              function(ui)
              {
                try
                {
                  var all = ui.val('all');
                  activePreview.css({ backgroundColor: all && '#' + all.hex || 'transparent' });
                  setAlpha.call($this, activePreview, all && Math.precision((all.a * 100) / 255, 4) || 0);
                }
                catch (e) { }
              },
            updateMapVisuals =
              function(ui)
              {
                switch (settings.color.mode)
                {
                  case 'h':
                    setBG.call($this, colorMapDiv, new Color({ h: ui.val('h') || 0, s: 100, v: 100 }).val('hex'));
                    break;
                  case 's':
                  case 'a':
                    var s = ui.val('s');
                    setAlpha.call($this, colorMapL2, 100 - (s != null ? s : 100));
                    break;
                  case 'v':
                    var v = ui.val('v');
                    setAlpha.call($this, colorMapL1, v != null ? v : 100);
                    break;
                  case 'r':
                    setAlpha.call($this, colorMapL2, Math.precision((ui.val('r') || 0) / 255 * 100, 4));
                    break;
                  case 'g':
                    setAlpha.call($this, colorMapL2, Math.precision((ui.val('g') || 0) / 255 * 100, 4));
                    break;
                  case 'b':
                    setAlpha.call($this, colorMapL2, Math.precision((ui.val('b') || 0) / 255 * 100));
                    break;
                }
                var a = ui.val('a');
                setAlpha.call($this, colorMapL3, Math.precision(((255 - (a || 0)) * 100) / 255, 4));
              },
            updateBarVisuals =
              function(ui)
              {
                switch (settings.color.mode)
                {
                  case 'h':
                    var a = ui.val('a');
                    setAlpha.call($this, colorBarL5, Math.precision(((255 - (a || 0)) * 100) / 255, 4));
                    break;
                  case 's':
                    var hva = ui.val('hva'),
                        saturatedColor = new Color({ h: hva && hva.h || 0, s: 100, v: hva != null ? hva.v : 100 });
                    setBG.call($this, colorBarDiv, saturatedColor.val('hex'));
                    setAlpha.call($this, colorBarL2, 100 - (hva != null ? hva.v : 100));
                    setAlpha.call($this, colorBarL5, Math.precision(((255 - (hva && hva.a || 0)) * 100) / 255, 4));
                    break;
                  case 'v':
                    var hsa = ui.val('hsa'),
                        valueColor = new Color({ h: hsa && hsa.h || 0, s: hsa != null ? hsa.s : 100, v: 100 });
                    setBG.call($this, colorBarDiv, valueColor.val('hex'));
                    setAlpha.call($this, colorBarL5, Math.precision(((255 - (hsa && hsa.a || 0)) * 100) / 255, 4));
                    break;
                  case 'r':
                  case 'g':
                  case 'b':
                    var hValue = 0, vValue = 0, rgba = ui.val('rgba');
                    if (settings.color.mode == 'r')
                    {
                      hValue = rgba && rgba.b || 0;
                      vValue = rgba && rgba.g || 0;
                    }
                    else if (settings.color.mode == 'g')
                    {
                      hValue = rgba && rgba.b || 0;
                      vValue = rgba && rgba.r || 0;
                    }
                    else if (settings.color.mode == 'b')
                    {
                      hValue = rgba && rgba.r || 0;
                      vValue = rgba && rgba.g || 0;
                    }
                    var middle = vValue > hValue ? hValue : vValue;
                    setAlpha.call($this, colorBarL2, hValue > vValue ? Math.precision(((hValue - vValue) / (255 - vValue)) * 100, 4) : 0);
                    setAlpha.call($this, colorBarL3, vValue > hValue ? Math.precision(((vValue - hValue) / (255 - hValue)) * 100, 4) : 0);
                    setAlpha.call($this, colorBarL4, Math.precision((middle / 255) * 100, 4));
                    setAlpha.call($this, colorBarL5, Math.precision(((255 - (rgba && rgba.a || 0)) * 100) / 255, 4));
                    break;
                  case 'a':
                    var a = ui.val('a');
                    setBG.call($this, colorBarDiv, ui.val('hex') || '000000');
                    setAlpha.call($this, colorBarL5, a != null ? 0 : 100);
                    setAlpha.call($this, colorBarL6, a != null ? 100 : 0);
                    break;
                }
              },
            setBG =
              function(el, c)
              {
                el.css({ backgroundColor: c && c.length == 6 && '#' + c || 'transparent' });
              },
            setImg =
              function(img, src)
              {
                if (isLessThanIE7 && (src.indexOf('AlphaBar.png') != -1 || src.indexOf('Bars.png') != -1 || src.indexOf('Maps.png') != -1))
                {
                  img.attr('pngSrc', src);
                  img.css({ backgroundImage: 'none', filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' + src + '\', sizingMethod=\'scale\')' });
                }
                else img.css({ backgroundImage: 'url(\'' + src + '\')' });
              },
            setImgLoc =
              function(img, y)
              {
                img.css({ top: y + 'px' });
              },
            setAlpha =
              function(obj, alpha)
              {
                obj.css({ visibility: alpha > 0 ? 'visible' : 'hidden' });
                if (alpha > 0 && alpha < 100)
                {
                  if (isLessThanIE7)
                  {
                    var src = obj.attr('pngSrc');
                    if (src != null && (src.indexOf('AlphaBar.png') != -1 || src.indexOf('Bars.png') != -1 || src.indexOf('Maps.png') != -1))
                      obj.css({ filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' + src + '\', sizingMethod=\'scale\') progid:DXImageTransform.Microsoft.Alpha(opacity=' + alpha + ')' });
                    else obj.css({ opacity: Math.precision(alpha / 100, 4) });
                  }
                  else obj.css({ opacity: Math.precision(alpha / 100, 4) });
                }
                else if (alpha == 0 || alpha == 100)
                {
                  if (isLessThanIE7)
                  {
                    var src = obj.attr('pngSrc');
                    if (src != null && (src.indexOf('AlphaBar.png') != -1 || src.indexOf('Bars.png') != -1 || src.indexOf('Maps.png') != -1))
                      obj.css({ filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' + src + '\', sizingMethod=\'scale\')' });
                    else obj.css({ opacity: '' });
                  }
                  else obj.css({ opacity: '' });
                }
              },
            revertColor = // revert color to original color when opened
              function()
              {
                color.active.val('ahex', color.current.val('ahex'));
              },
            commitColor = // commit the color changes
              function()
              {
                color.current.val('ahex', color.active.val('ahex'));
              },
            radioClicked =
              function(e)
              {
                $(this).parents('tbody:first').find('input:radio[value!="'+e.target.value+'"]').removeAttr('checked');
                setColorMode.call($this, e.target.value);
              },
            currentClicked =
              function()
              {
                revertColor.call($this);
              },
            cancelClicked =
              function()
              {
                revertColor.call($this);
                settings.window.expandable && hide.call($this);
                $.isFunction(cancelCallback) && cancelCallback.call($this, color.active, cancelButton);
              },
            okClicked =
              function()
              {
                commitColor.call($this);
                settings.window.expandable && hide.call($this);
                $.isFunction(commitCallback) && commitCallback.call($this, color.active, okButton);
              },
            iconImageClicked =
              function()
              {
                show.call($this);
              },
            currentColorChanged =
              function(ui, context)
              {
                var hex = ui.val('hex');
                currentPreview.css({ backgroundColor: hex && '#' + hex || 'transparent' });
                setAlpha.call($this, currentPreview, Math.precision(((ui.val('a') || 0) * 100) / 255, 4));
              },
            expandableColorChanged =
              function(ui, context)
              {
                var hex = ui.val('hex');
                var va = ui.val('va');
                iconColor.css({ backgroundColor: hex && '#' + hex || 'transparent' });
                setAlpha.call($this, iconAlpha, Math.precision(((255 - (va && va.a || 0)) * 100) / 255, 4));
                if (settings.window.bindToInput&&settings.window.updateInputColor)
                  settings.window.input.css(
                    {
                      backgroundColor: hex && '#' + hex || 'transparent',
                      color: va == null || va.v > 75 ? '#000000' : '#ffffff'
                    });
              },
            moveBarMouseDown =
              function(e)
              {
                var element = settings.window.element, // local copies for YUI compressor
                  page = settings.window.page;
                elementStartX = parseInt(container.css('left'));
                elementStartY = parseInt(container.css('top'));
                pageStartX = e.pageX;
                pageStartY = e.pageY;
                // bind events to document to move window - we will unbind these on mouseup
                $(document).bind('mousemove', documentMouseMove).bind('mouseup', documentMouseUp);
                e.preventDefault(); // prevent attempted dragging of the column
              },
            documentMouseMove =
              function(e)
              {
                container.css({ left: elementStartX - (pageStartX - e.pageX) + 'px', top: elementStartY - (pageStartY - e.pageY) + 'px' });
                if (settings.window.expandable && !$.support.boxModel) container.prev().css({ left: container.css("left"), top: container.css("top") });
                e.stopPropagation();
                e.preventDefault();
                return false;
              },
            documentMouseUp =
              function(e)
              {
                $(document).unbind('mousemove', documentMouseMove).unbind('mouseup', documentMouseUp);
                e.stopPropagation();
                e.preventDefault();
                return false;
              },
            quickPickClicked =
              function(e)
              {
                e.preventDefault();
                e.stopPropagation();
                color.active.val('ahex', $(this).attr('title') || null, e.target);
                return false;
              },
            commitCallback = $.isFunction($arguments[1]) && $arguments[1] || null,
            liveCallback = $.isFunction($arguments[2]) && $arguments[2] || null,
            cancelCallback = $.isFunction($arguments[3]) && $arguments[3] || null,
            show =
              function()
              {
                color.current.val('ahex', color.active.val('ahex'));
                var attachIFrame = function()
                  {
                    if (!settings.window.expandable || $.support.boxModel) return;
                    var table = container.find('table:first');
                    container.before('<iframe/>');
                    container.prev().css({ width: table.width(), height: container.height(), opacity: 0, position: 'absolute', left: container.css("left"), top: container.css("top") });
                  };
                if (settings.window.expandable)
                {
                  $(document.body).children('div.jPicker.Container').css({zIndex:10});
                  container.css({zIndex:20});
                }
                switch (settings.window.effects.type)
                {
                  case 'fade':
                    container.fadeIn(settings.window.effects.speed.show, attachIFrame);
                    break;
                  case 'slide':
                    container.slideDown(settings.window.effects.speed.show, attachIFrame);
                    break;
                  case 'show':
                  default:
                    container.show(settings.window.effects.speed.show, attachIFrame);
                    break;
                }
              },
            hide =
              function()
              {
                var removeIFrame = function()
                  {
                    if (settings.window.expandable) container.css({ zIndex: 10 });
                    if (!settings.window.expandable || $.support.boxModel) return;
                    container.prev().remove();
                  };
                switch (settings.window.effects.type)
                {
                  case 'fade':
                    container.fadeOut(settings.window.effects.speed.hide, removeIFrame);
                    break;
                  case 'slide':
                    container.slideUp(settings.window.effects.speed.hide, removeIFrame);
                    break;
                  case 'show':
                  default:
                    container.hide(settings.window.effects.speed.hide, removeIFrame);
                    break;
                }
              },
            initialize =
              function()
              {
                var win = settings.window,

                    popup = win.expandable ? $($this).next().find('.Container:first') : null;

                container = win.expandable ? $('<div/>') : $($this);

                container.addClass('jPicker Container');

                if (win.expandable) container.hide();

                container.get(0).onselectstart = function(event){ if (event.target.nodeName.toLowerCase() !== 'input') return false; };
                // inject html source code - we are using a single table for this control - I know tables are considered bad, but it takes care of equal height columns and
                // this control really is tabular data, so I believe it is the right move
                var all = color.active.val('all');
                if (win.alphaPrecision < 0) win.alphaPrecision = 0;
                else if (win.alphaPrecision > 2) win.alphaPrecision = 2;
                var controlHtml='<table class="jPicker" cellpadding="0" cellspacing="0"><tbody>' + (win.expandable ? '<tr><td class="Move" colspan="5">&nbsp;</td></tr>' : '') + '<tr><td rowspan="9"><h2 class="Title">' + (win.title || localization.text.title) + '</h2><div class="Map"><span class="Map1">&nbsp;</span><span class="Map2">&nbsp;</span><span class="Map3">&nbsp;</span><img src="' + images.clientPath + images.colorMap.arrow.file + '" class="Arrow"/></div></td><td rowspan="9"><div class="Bar"><span class="Map1">&nbsp;</span><span class="Map2">&nbsp;</span><span class="Map3">&nbsp;</span><span class="Map4">&nbsp;</span><span class="Map5">&nbsp;</span><span class="Map6">&nbsp;</span><img src="' + images.clientPath + images.colorBar.arrow.file + '" class="Arrow"/></div></td><td colspan="2" class="Preview">' + localization.text.newColor + '<div><span class="Active" title="' + localization.tooltips.colors.newColor + '">&nbsp;</span><span class="Current" title="' + localization.tooltips.colors.currentColor + '">&nbsp;</span></div>' + localization.text.currentColor + '</td><td rowspan="9" class="Button"><input type="button" class="Ok" value="' + localization.text.ok + '" title="' + localization.tooltips.buttons.ok + '"/><input type="button" class="Cancel" value="' + localization.text.cancel + '" title="' + localization.tooltips.buttons.cancel + '"/><hr/><div class="Grid">&nbsp;</div></td></tr><tr class="Hue"><td class="Radio"><label title="' + localization.tooltips.hue.radio + '"><input type="radio" value="h"' + (settings.color.mode == 'h' ? ' checked="checked"' : '') + '/>H:</label></td><td class="Text"><input type="text" maxlength="3" value="' + (all != null ? all.h : '') + '" title="' + localization.tooltips.hue.textbox + '"/>&nbsp;&deg;</td></tr><tr class="Saturation"><td class="Radio"><label title="' + localization.tooltips.saturation.radio + '"><input type="radio" value="s"' + (settings.color.mode == 's' ? ' checked="checked"' : '') + '/>S:</label></td><td class="Text"><input type="text" maxlength="3" value="' + (all != null ? all.s : '') + '" title="' + localization.tooltips.saturation.textbox + '"/>&nbsp;%</td></tr><tr class="Value"><td class="Radio"><label title="' + localization.tooltips.value.radio + '"><input type="radio" value="v"' + (settings.color.mode == 'v' ? ' checked="checked"' : '') + '/>V:</label><br/><br/></td><td class="Text"><input type="text" maxlength="3" value="' + (all != null ? all.v : '') + '" title="' + localization.tooltips.value.textbox + '"/>&nbsp;%<br/><br/></td></tr><tr class="Red"><td class="Radio"><label title="' + localization.tooltips.red.radio + '"><input type="radio" value="r"' + (settings.color.mode == 'r' ? ' checked="checked"' : '') + '/>R:</label></td><td class="Text"><input type="text" maxlength="3" value="' + (all != null ? all.r : '') + '" title="' + localization.tooltips.red.textbox + '"/></td></tr><tr class="Green"><td class="Radio"><label title="' + localization.tooltips.green.radio + '"><input type="radio" value="g"' + (settings.color.mode == 'g' ? ' checked="checked"' : '') + '/>G:</label></td><td class="Text"><input type="text" maxlength="3" value="' + (all != null ? all.g : '') + '" title="' + localization.tooltips.green.textbox + '"/></td></tr><tr class="Blue"><td class="Radio"><label title="' + localization.tooltips.blue.radio + '"><input type="radio" value="b"' + (settings.color.mode == 'b' ? ' checked="checked"' : '') + '/>B:</label></td><td class="Text"><input type="text" maxlength="3" value="' + (all != null ? all.b : '') + '" title="' + localization.tooltips.blue.textbox + '"/></td></tr><tr class="Alpha"><td class="Radio">' + (win.alphaSupport ? '<label title="' + localization.tooltips.alpha.radio + '"><input type="radio" value="a"' + (settings.color.mode == 'a' ? ' checked="checked"' : '') + '/>A:</label>' : '&nbsp;') + '</td><td class="Text">' + (win.alphaSupport ? '<input type="text" maxlength="' + (3 + win.alphaPrecision) + '" value="' + (all != null ? Math.precision((all.a * 100) / 255, win.alphaPrecision) : '') + '" title="' + localization.tooltips.alpha.textbox + '"/>&nbsp;%' : '&nbsp;') + '</td></tr><tr class="Hex"><td colspan="2" class="Text"><label title="' + localization.tooltips.hex.textbox + '">#:<input type="text" maxlength="6" class="Hex" value="' + (all != null ? all.hex : '') + '"/></label>' + (win.alphaSupport ? '<input type="text" maxlength="2" class="AHex" value="' + (all != null ? all.ahex.substring(6) : '') + '" title="' + localization.tooltips.hex.alpha + '"/></td>' : '&nbsp;') + '</tr></tbody></table>';
                if (win.expandable)
                {
                  container.html(controlHtml);
                  if($(document.body).children('div.jPicker.Container').length==0)$(document.body).prepend(container);
                  else $(document.body).children('div.jPicker.Container:last').after(container);
                  container.mousedown(
                    function()
                    {
                      $(document.body).children('div.jPicker.Container').css({zIndex:10});
                      container.css({zIndex:20});
                    });
                  container.css( // positions must be set and display set to absolute before source code injection or IE will size the container to fit the window
                    {
                      left:
                        win.position.x == 'left' ? (popup.offset().left - 530 - (win.position.y == 'center' ? 25 : 0)) + 'px' :
                        win.position.x == 'center' ? (popup.offset().left - 260) + 'px' :
                        win.position.x == 'right' ? (popup.offset().left - 10 + (win.position.y == 'center' ? 25 : 0)) + 'px' :
                        win.position.x == 'screenCenter' ? (($(document).width() >> 1) - 260) + 'px' : (popup.offset().left + parseInt(win.position.x)) + 'px',
                      position: 'absolute',
                      top: win.position.y == 'top' ? (popup.offset().top) + 'px' :
                           win.position.y == 'center' ? (popup.offset().top - 156) + 'px' :
                           win.position.y == 'bottom' ? (popup.offset().top + 25) + 'px' : (popup.offset().top + parseInt(win.position.y)) + 'px'
                    });
                }
                else
                {
                  container = $($this);
                  container.html(controlHtml);
                }
                // initialize the objects to the source code just injected
                var tbody = container.find('tbody:first');
                colorMapDiv = tbody.find('div.Map:first');
                colorBarDiv = tbody.find('div.Bar:first');
                var MapMaps = colorMapDiv.find('span'),
                    BarMaps = colorBarDiv.find('span');
                colorMapL1 = MapMaps.filter('.Map1:first');
                colorMapL2 = MapMaps.filter('.Map2:first');
                colorMapL3 = MapMaps.filter('.Map3:first');
                colorBarL1 = BarMaps.filter('.Map1:first');
                colorBarL2 = BarMaps.filter('.Map2:first');
                colorBarL3 = BarMaps.filter('.Map3:first');
                colorBarL4 = BarMaps.filter('.Map4:first');
                colorBarL5 = BarMaps.filter('.Map5:first');
                colorBarL6 = BarMaps.filter('.Map6:first');
                // create color pickers and maps
                colorMap = new Slider(colorMapDiv,
                  {
                    map:
                    {
                      width: images.colorMap.width,
                      height: images.colorMap.height
                    },
                    arrow:
                    {
                      image: images.clientPath + images.colorMap.arrow.file,
                      width: images.colorMap.arrow.width,
                      height: images.colorMap.arrow.height
                    }
                  });
                colorMap.bind(mapValueChanged);
                colorBar = new Slider(colorBarDiv,
                  {
                    map:
                    {
                      width: images.colorBar.width,
                      height: images.colorBar.height
                    },
                    arrow:
                    {
                      image: images.clientPath + images.colorBar.arrow.file,
                      width: images.colorBar.arrow.width,
                      height: images.colorBar.arrow.height
                    }
                  });
                colorBar.bind(colorBarValueChanged);
                colorPicker = new ColorValuePicker(tbody, color.active, win.expandable && win.bindToInput ? win.input : null, win.alphaPrecision);
                var hex = all != null ? all.hex : null,
                    preview = tbody.find('.Preview'),
                    button = tbody.find('.Button');
                activePreview = preview.find('.Active:first').css({ backgroundColor: hex && '#' + hex || 'transparent' });
                currentPreview = preview.find('.Current:first').css({ backgroundColor: hex && '#' + hex || 'transparent' }).bind('click', currentClicked);
                setAlpha.call($this, currentPreview, Math.precision(color.current.val('a') * 100) / 255, 4);
                okButton = button.find('.Ok:first').bind('click', okClicked);
                cancelButton = button.find('.Cancel:first').bind('click', cancelClicked);
                grid = button.find('.Grid:first');
                setTimeout(
                  function()
                  {
                    setImg.call($this, colorMapL1, images.clientPath + 'Maps.png');
                    setImg.call($this, colorMapL2, images.clientPath + 'Maps.png');
                    setImg.call($this, colorMapL3, images.clientPath + 'map-opacity.png');
                    setImg.call($this, colorBarL1, images.clientPath + 'Bars.png');
                    setImg.call($this, colorBarL2, images.clientPath + 'Bars.png');
                    setImg.call($this, colorBarL3, images.clientPath + 'Bars.png');
                    setImg.call($this, colorBarL4, images.clientPath + 'Bars.png');
                    setImg.call($this, colorBarL5, images.clientPath + 'bar-opacity.png');
                    setImg.call($this, colorBarL6, images.clientPath + 'AlphaBar.png');
                    setImg.call($this, preview.find('div:first'), images.clientPath + 'preview-opacity.png');
                  }, 0);
                tbody.find('td.Radio input').bind('click', radioClicked);
                // initialize quick list
                if (color.quickList && color.quickList.length > 0)
                {
                  var html = '';
                  for (i = 0; i < color.quickList.length; i++)
                  {
                    /* if default colors are hex strings, change them to color objects */
                    if ((typeof (color.quickList[i])).toString().toLowerCase() == 'string') color.quickList[i] = new Color({ hex: color.quickList[i] });
                    var alpha = color.quickList[i].val('a');
                    var ahex = color.quickList[i].val('ahex');
                    if (!win.alphaSupport && ahex) ahex = ahex.substring(0, 6) + 'ff';
                    var quickHex = color.quickList[i].val('hex');
                    html+='<span class="QuickColor"' + (ahex && ' title="#' + ahex + '"' || '') + ' style="background-color:' + (quickHex && '#' + quickHex || '') + ';' + (quickHex ? '' : 'background-image:url(' + images.clientPath + 'NoColor.png)') + (win.alphaSupport && alpha && alpha < 255 ? ';opacity:' + Math.precision(alpha / 255, 4) + ';filter:Alpha(opacity=' + Math.precision(alpha / 2.55, 4) + ')' : '') + '">&nbsp;</span>';
                  }
                  setImg.call($this, grid, images.clientPath + 'bar-opacity.png');
                  grid.html(html);
                  grid.find('.QuickColor').click(quickPickClicked);
                }
                setColorMode.call($this, settings.color.mode);
                color.active.bind(activeColorChanged);
                $.isFunction(liveCallback) && color.active.bind(liveCallback);
                color.current.bind(currentColorChanged);
                // bind to input
                if (win.expandable)
                {
                  $this.icon = popup.parents('.Icon:first');
                  iconColor = $this.icon.find('.Color:first').css({ backgroundColor: hex && '#' + hex || 'transparent' });
                  iconAlpha = $this.icon.find('.Alpha:first');
                  setImg.call($this, iconAlpha, images.clientPath + 'bar-opacity.png');
                  setAlpha.call($this, iconAlpha, Math.precision(((255 - (all != null ? all.a : 0)) * 100) / 255, 4));
                  iconImage = $this.icon.find('.Image:first').css(
                    {
                      backgroundImage: 'url(\'' + images.clientPath + images.picker.file + '\')'
                    }).bind('click', iconImageClicked);
                  if (win.bindToInput&&win.updateInputColor)
                    win.input.css(
                      {
                        backgroundColor: hex && '#' + hex || 'transparent',
                        color: all == null || all.v > 75 ? '#000000' : '#ffffff'
                      });
                  moveBar = tbody.find('.Move:first').bind('mousedown', moveBarMouseDown);
                  color.active.bind(expandableColorChanged);
                }
                else show.call($this);
              },
            destroy =
              function()
              {
                container.find('td.Radio input').unbind('click', radioClicked);
                currentPreview.unbind('click', currentClicked);
                cancelButton.unbind('click', cancelClicked);
                okButton.unbind('click', okClicked);
                if (settings.window.expandable)
                {
                  iconImage.unbind('click', iconImageClicked);
                  moveBar.unbind('mousedown', moveBarMouseDown);
                  $this.icon = null;
                }
                container.find('.QuickColor').unbind('click', quickPickClicked);
                colorMapDiv = null;
                colorBarDiv = null;
                colorMapL1 = null;
                colorMapL2 = null;
                colorMapL3 = null;
                colorBarL1 = null;
                colorBarL2 = null;
                colorBarL3 = null;
                colorBarL4 = null;
                colorBarL5 = null;
                colorBarL6 = null;
                colorMap.destroy();
                colorMap = null;
                colorBar.destroy();
                colorBar = null;
                colorPicker.destroy();
                colorPicker = null;
                activePreview = null;
                currentPreview = null;
                okButton = null;
                cancelButton = null;
                grid = null;
                commitCallback = null;
                cancelCallback = null;
                liveCallback = null;
                container.html('');
                for (i = 0; i < List.length; i++) if (List[i] == $this) List.splice(i, 1);
              },
            images = settings.images, // local copies for YUI compressor
            localization = settings.localization,
            color =
              {
                active: (typeof(settings.color.active)).toString().toLowerCase() == 'string' ? new Color({ ahex: !settings.window.alphaSupport && settings.color.active ? settings.color.active.substring(0, 6) + 'ff' : settings.color.active }) : new Color({ ahex: !settings.window.alphaSupport && settings.color.active.val('ahex') ? settings.color.active.val('ahex').substring(0, 6) + 'ff' : settings.color.active.val('ahex') }),
                current: (typeof(settings.color.active)).toString().toLowerCase() == 'string' ? new Color({ ahex: !settings.window.alphaSupport && settings.color.active ? settings.color.active.substring(0, 6) + 'ff' : settings.color.active }) : new Color({ ahex: !settings.window.alphaSupport && settings.color.active.val('ahex') ? settings.color.active.val('ahex').substring(0, 6) + 'ff' : settings.color.active.val('ahex') }),
                quickList: settings.color.quickList
              };
          $.extend(true, $this, // public properties, methods, and callbacks
            {
              commitCallback: commitCallback, // commitCallback function can be overridden to return the selected color to a method you specify when the user clicks "OK"
              liveCallback: liveCallback, // liveCallback function can be overridden to return the selected color to a method you specify in live mode (continuous update)
              cancelCallback: cancelCallback, // cancelCallback function can be overridden to a method you specify when the user clicks "Cancel"
              color: color,
              show: show,
              hide: hide,
              destroy: destroy // destroys this control entirely, removing all events and objects, and removing itself from the List
            });
          List.push($this);
          setTimeout(
            function()
            {
              initialize.call($this);
            }, 0);
        });
    };
  $.fn.jPicker.defaults = /* jPicker defaults - you can change anything in this section (such as the clientPath to your images) without fear of breaking the program */
      {
      window:
        {
          title: null, /* any title for the jPicker window itself - displays "Drag Markers To Pick A Color" if left null */
          effects:
          {
            type: 'fade', /* effect used to show/hide an expandable picker. Acceptable values "slide", "show", "fade" */
            speed:
            {
              show: 'slow', /* duration of "show" effect. Acceptable values are "fast", "slow", or time in ms */
              hide: 'fast' /* duration of "hide" effect. Acceptable values are "fast", "slow", or time in ms */
            }
          },
          position:
          {
            x: 'screenCenter', /* acceptable values "left", "center", "right", "screenCenter", or relative px value */
            y: 'top' /* acceptable values "top", "bottom", "center", or relative px value */
          },
          expandable: false, /* default to large static picker - set to true to make an expandable picker (small icon with popup) - set automatically when binded to input element */
          liveUpdate: true, /* set false if you want the user to have to click "OK" before the binded input box updates values (always "true" for expandable picker) */
          alphaSupport: false, /* set to true to enable alpha picking */
          alphaPrecision: 0, /* set decimal precision for alpha percentage display - hex codes do not map directly to percentage integers - range 0-2 */
          updateInputColor: true /* set to false to prevent binded input colors from changing */
        },
      color:
        {
          mode: 'h', /* acceptabled values "h" (hue), "s" (saturation), "v" (value), "r" (red), "g" (green), "b" (blue), "a" (alpha) */
          active: new Color({ ahex: '#ffcc00ff' }), /* acceptable values are any declared $.jPicker.Color object or string HEX value (e.g. #ffc000) WITH OR WITHOUT the "#" prefix */
          quickList: /* the quick pick color list */
            [
              new Color({ h: 360, s: 33, v: 100 }), /* acceptable values are any declared $.jPicker.Color object or string HEX value (e.g. #ffc000) WITH OR WITHOUT the "#" prefix */
              new Color({ h: 360, s: 66, v: 100 }),
              new Color({ h: 360, s: 100, v: 100 }),
              new Color({ h: 360, s: 100, v: 75 }),
              new Color({ h: 360, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 100 }),
              new Color({ h: 30, s: 33, v: 100 }),
              new Color({ h: 30, s: 66, v: 100 }),
              new Color({ h: 30, s: 100, v: 100 }),
              new Color({ h: 30, s: 100, v: 75 }),
              new Color({ h: 30, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 90 }),
              new Color({ h: 60, s: 33, v: 100 }),
              new Color({ h: 60, s: 66, v: 100 }),
              new Color({ h: 60, s: 100, v: 100 }),
              new Color({ h: 60, s: 100, v: 75 }),
              new Color({ h: 60, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 80 }),
              new Color({ h: 90, s: 33, v: 100 }),
              new Color({ h: 90, s: 66, v: 100 }),
              new Color({ h: 90, s: 100, v: 100 }),
              new Color({ h: 90, s: 100, v: 75 }),
              new Color({ h: 90, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 70 }),
              new Color({ h: 120, s: 33, v: 100 }),
              new Color({ h: 120, s: 66, v: 100 }),
              new Color({ h: 120, s: 100, v: 100 }),
              new Color({ h: 120, s: 100, v: 75 }),
              new Color({ h: 120, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 60 }),
              new Color({ h: 150, s: 33, v: 100 }),
              new Color({ h: 150, s: 66, v: 100 }),
              new Color({ h: 150, s: 100, v: 100 }),
              new Color({ h: 150, s: 100, v: 75 }),
              new Color({ h: 150, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 50 }),
              new Color({ h: 180, s: 33, v: 100 }),
              new Color({ h: 180, s: 66, v: 100 }),
              new Color({ h: 180, s: 100, v: 100 }),
              new Color({ h: 180, s: 100, v: 75 }),
              new Color({ h: 180, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 40 }),
              new Color({ h: 210, s: 33, v: 100 }),
              new Color({ h: 210, s: 66, v: 100 }),
              new Color({ h: 210, s: 100, v: 100 }),
              new Color({ h: 210, s: 100, v: 75 }),
              new Color({ h: 210, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 30 }),
              new Color({ h: 240, s: 33, v: 100 }),
              new Color({ h: 240, s: 66, v: 100 }),
              new Color({ h: 240, s: 100, v: 100 }),
              new Color({ h: 240, s: 100, v: 75 }),
              new Color({ h: 240, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 20 }),
              new Color({ h: 270, s: 33, v: 100 }),
              new Color({ h: 270, s: 66, v: 100 }),
              new Color({ h: 270, s: 100, v: 100 }),
              new Color({ h: 270, s: 100, v: 75 }),
              new Color({ h: 270, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 10 }),
              new Color({ h: 300, s: 33, v: 100 }),
              new Color({ h: 300, s: 66, v: 100 }),
              new Color({ h: 300, s: 100, v: 100 }),
              new Color({ h: 300, s: 100, v: 75 }),
              new Color({ h: 300, s: 100, v: 50 }),
              new Color({ h: 180, s: 0, v: 0 }),
              new Color({ h: 330, s: 33, v: 100 }),
              new Color({ h: 330, s: 66, v: 100 }),
              new Color({ h: 330, s: 100, v: 100 }),
              new Color({ h: 330, s: 100, v: 75 }),
              new Color({ h: 330, s: 100, v: 50 }),
              new Color()
            ]
        },
      images:
        {
          clientPath: wp_js.themeDir+'/functions/js/jpicker/images/', /* Path to image files */
          colorMap:
          {
            width: 256,
            height: 256,
            arrow:
            {
              file: 'mappoint.gif', /* ColorMap arrow icon */
              width: 15,
              height: 15
            }
          },
          colorBar:
          {
            width: 20,
            height: 256,
            arrow:
            {
              file: 'rangearrows.gif', /* ColorBar arrow icon */
              width: 20,
              height: 7
            }
          },
          picker:
          {
            file: 'picker.gif', /* Color Picker icon */
            width: 25,
            height: 24
          }
        },
      localization: /* alter these to change the text presented by the picker (e.g. different language) */
        {
          text:
          {
            title: 'Drag Markers To Pick A Color',
            newColor: 'new',
            currentColor: 'current',
            ok: 'OK',
            cancel: 'Cancel'
          },
          tooltips:
          {
            colors:
            {
              newColor: 'New Color - Press &ldquo;OK&rdquo; To Commit',
              currentColor: 'Click To Revert To Original Color'
            },
            buttons:
            {
              ok: 'Commit To This Color Selection',
              cancel: 'Cancel And Revert To Original Color'
            },
            hue:
            {
              radio: 'Set To &ldquo;Hue&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Hue&rdquo; Value (0-360&deg;)'
            },
            saturation:
            {
              radio: 'Set To &ldquo;Saturation&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Saturation&rdquo; Value (0-100%)'
            },
            value:
            {
              radio: 'Set To &ldquo;Value&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Value&rdquo; Value (0-100%)'
            },
            red:
            {
              radio: 'Set To &ldquo;Red&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Red&rdquo; Value (0-255)'
            },
            green:
            {
              radio: 'Set To &ldquo;Green&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Green&rdquo; Value (0-255)'
            },
            blue:
            {
              radio: 'Set To &ldquo;Blue&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Blue&rdquo; Value (0-255)'
            },
            alpha:
            {
              radio: 'Set To &ldquo;Alpha&rdquo; Color Mode',
              textbox: 'Enter A &ldquo;Alpha&rdquo; Value (0-100)'
            },
            hex:
            {
              textbox: 'Enter A &ldquo;Hex&rdquo; Color Value (#000000-#ffffff)',
              alpha: 'Enter A &ldquo;Alpha&rdquo; Value (#00-#ff)'
            }
          }
        }
    };
})(jQuery, '1.1.6');/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

/**
 * Create a cookie with the given name and value and other optional parameters.
 *
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Set the value of a cookie.
 * @example $.cookie('the_cookie', 'the_value', { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Create a cookie with all available options.
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Create a session cookie.
 * @example $.cookie('the_cookie', null);
 * @desc Delete a cookie by passing null as value. Keep in mind that you have to use the same path and domain
 *       used when the cookie was set.
 *
 * @param String name The name of the cookie.
 * @param String value The value of the cookie.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Create multiple cookies at once stored in an object, with optional parameters affecting them all.
 *
 * @example $.cookie({ 'the_cookie' : 'the_value' });
 * @desc Set/delete multiple cookies at once.
 * @example $.cookie({ 'the_cookie' : 'the_value' }, { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Set/delete multiple cookies with options.
 *
 * @param Object name An object with multiple cookie name-value pairs.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the value of a cookie with the given name.
 *
 * @example $.cookie('the_cookie');
 * @desc Get the value of a cookie.
 *
 * @param String name The name of the cookie.
 * @return The value of the cookie.
 * @type String
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the names and values of all cookies for the page.
 *
 * @example $.cookie();
 * @desc Get all the cookies for the page
 *
 * @return an object with the name-value pairs of all available cookies.
 * @type Object
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */


jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined'  ||  (name  &&  typeof name != 'string')) { // name and value given, set cookie
        if (typeof name == 'string') {
            options = options || {};
            if (value === null) {
                value = '';
                options.expires = -1;
            }
            var expires = '';
            if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                var date;
                if (typeof options.expires == 'number') {
                    date = new Date();
                    date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                } else {
                    date = options.expires;
                }
                expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
            }
            // CAUTION: Needed to parenthesize options.path and options.domain
            // in the following expressions, otherwise they evaluate to undefined
            // in the packed version for some reason...
            var path = options.path ? '; path=' + (options.path) : '';
            var domain = options.domain ? '; domain=' + (options.domain) : '';
            var secure = options.secure ? '; secure' : '';
            document.cookie = name + '=' + encodeURIComponent(value) + expires + path + domain + secure;
        } else { // `name` is really an object of multiple cookies to be set.
          for (var n in name) { jQuery.cookie(n, name[n], value||options); }
        }
    } else { // get cookie (or all cookies if name is not provided)
        var returnValue = {};
        if (document.cookie) {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (!name) {
                    var nameLength = cookie.indexOf('=');
                    returnValue[ cookie.substr(0, nameLength)] = decodeURIComponent(cookie.substr(nameLength+1));
                } else if (cookie.substr(0, name.length + 1) == (name + '=')) {
                    returnValue = decodeURIComponent(cookie.substr(name.length + 1));
                    break;
                }
            }
        }
        return returnValue;
    }
};
/*!
 * jQuery UI 1.8.16
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI
 */
(function(c,j){function k(a,b){var d=a.nodeName.toLowerCase();if("area"===d){b=a.parentNode;d=b.name;if(!a.href||!d||b.nodeName.toLowerCase()!=="map")return false;a=c("img[usemap=#"+d+"]")[0];return!!a&&l(a)}return(/input|select|textarea|button|object/.test(d)?!a.disabled:"a"==d?a.href||b:b)&&l(a)}function l(a){return!c(a).parents().andSelf().filter(function(){return c.curCSS(this,"visibility")==="hidden"||c.expr.filters.hidden(this)}).length}c.ui=c.ui||{};if(!c.ui.version){c.extend(c.ui,{version:"1.8.16",
keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91}});c.fn.extend({propAttr:c.fn.prop||c.fn.attr,_focus:c.fn.focus,focus:function(a,b){return typeof a==="number"?this.each(function(){var d=
this;setTimeout(function(){c(d).focus();b&&b.call(d)},a)}):this._focus.apply(this,arguments)},scrollParent:function(){var a;a=c.browser.msie&&/(static|relative)/.test(this.css("position"))||/absolute/.test(this.css("position"))?this.parents().filter(function(){return/(relative|absolute|fixed)/.test(c.curCSS(this,"position",1))&&/(auto|scroll)/.test(c.curCSS(this,"overflow",1)+c.curCSS(this,"overflow-y",1)+c.curCSS(this,"overflow-x",1))}).eq(0):this.parents().filter(function(){return/(auto|scroll)/.test(c.curCSS(this,
"overflow",1)+c.curCSS(this,"overflow-y",1)+c.curCSS(this,"overflow-x",1))}).eq(0);return/fixed/.test(this.css("position"))||!a.length?c(document):a},zIndex:function(a){if(a!==j)return this.css("zIndex",a);if(this.length){a=c(this[0]);for(var b;a.length&&a[0]!==document;){b=a.css("position");if(b==="absolute"||b==="relative"||b==="fixed"){b=parseInt(a.css("zIndex"),10);if(!isNaN(b)&&b!==0)return b}a=a.parent()}}return 0},disableSelection:function(){return this.bind((c.support.selectstart?"selectstart":
"mousedown")+".ui-disableSelection",function(a){a.preventDefault()})},enableSelection:function(){return this.unbind(".ui-disableSelection")}});c.each(["Width","Height"],function(a,b){function d(f,g,m,n){c.each(e,function(){g-=parseFloat(c.curCSS(f,"padding"+this,true))||0;if(m)g-=parseFloat(c.curCSS(f,"border"+this+"Width",true))||0;if(n)g-=parseFloat(c.curCSS(f,"margin"+this,true))||0});return g}var e=b==="Width"?["Left","Right"]:["Top","Bottom"],h=b.toLowerCase(),i={innerWidth:c.fn.innerWidth,innerHeight:c.fn.innerHeight,
outerWidth:c.fn.outerWidth,outerHeight:c.fn.outerHeight};c.fn["inner"+b]=function(f){if(f===j)return i["inner"+b].call(this);return this.each(function(){c(this).css(h,d(this,f)+"px")})};c.fn["outer"+b]=function(f,g){if(typeof f!=="number")return i["outer"+b].call(this,f);return this.each(function(){c(this).css(h,d(this,f,true,g)+"px")})}});c.extend(c.expr[":"],{data:function(a,b,d){return!!c.data(a,d[3])},focusable:function(a){return k(a,!isNaN(c.attr(a,"tabindex")))},tabbable:function(a){var b=c.attr(a,
"tabindex"),d=isNaN(b);return(d||b>=0)&&k(a,!d)}});c(function(){var a=document.body,b=a.appendChild(b=document.createElement("div"));c.extend(b.style,{minHeight:"100px",height:"auto",padding:0,borderWidth:0});c.support.minHeight=b.offsetHeight===100;c.support.selectstart="onselectstart"in b;a.removeChild(b).style.display="none"});c.extend(c.ui,{plugin:{add:function(a,b,d){a=c.ui[a].prototype;for(var e in d){a.plugins[e]=a.plugins[e]||[];a.plugins[e].push([b,d[e]])}},call:function(a,b,d){if((b=a.plugins[b])&&
a.element[0].parentNode)for(var e=0;e<b.length;e++)a.options[b[e][0]]&&b[e][1].apply(a.element,d)}},contains:function(a,b){return document.compareDocumentPosition?a.compareDocumentPosition(b)&16:a!==b&&a.contains(b)},hasScroll:function(a,b){if(c(a).css("overflow")==="hidden")return false;b=b&&b==="left"?"scrollLeft":"scrollTop";var d=false;if(a[b]>0)return true;a[b]=1;d=a[b]>0;a[b]=0;return d},isOverAxis:function(a,b,d){return a>b&&a<b+d},isOver:function(a,b,d,e,h,i){return c.ui.isOverAxis(a,d,h)&&
c.ui.isOverAxis(b,e,i)}})}})(jQuery);
;/*!
 * jQuery UI Widget 1.8.16
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Widget
 */
(function(b,j){if(b.cleanData){var k=b.cleanData;b.cleanData=function(a){for(var c=0,d;(d=a[c])!=null;c++)try{b(d).triggerHandler("remove")}catch(e){}k(a)}}else{var l=b.fn.remove;b.fn.remove=function(a,c){return this.each(function(){if(!c)if(!a||b.filter(a,[this]).length)b("*",this).add([this]).each(function(){try{b(this).triggerHandler("remove")}catch(d){}});return l.call(b(this),a,c)})}}b.widget=function(a,c,d){var e=a.split(".")[0],f;a=a.split(".")[1];f=e+"-"+a;if(!d){d=c;c=b.Widget}b.expr[":"][f]=
function(h){return!!b.data(h,a)};b[e]=b[e]||{};b[e][a]=function(h,g){arguments.length&&this._createWidget(h,g)};c=new c;c.options=b.extend(true,{},c.options);b[e][a].prototype=b.extend(true,c,{namespace:e,widgetName:a,widgetEventPrefix:b[e][a].prototype.widgetEventPrefix||a,widgetBaseClass:f},d);b.widget.bridge(a,b[e][a])};b.widget.bridge=function(a,c){b.fn[a]=function(d){var e=typeof d==="string",f=Array.prototype.slice.call(arguments,1),h=this;d=!e&&f.length?b.extend.apply(null,[true,d].concat(f)):
d;if(e&&d.charAt(0)==="_")return h;e?this.each(function(){var g=b.data(this,a),i=g&&b.isFunction(g[d])?g[d].apply(g,f):g;if(i!==g&&i!==j){h=i;return false}}):this.each(function(){var g=b.data(this,a);g?g.option(d||{})._init():b.data(this,a,new c(d,this))});return h}};b.Widget=function(a,c){arguments.length&&this._createWidget(a,c)};b.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:false},_createWidget:function(a,c){b.data(c,this.widgetName,this);this.element=b(c);this.options=
b.extend(true,{},this.options,this._getCreateOptions(),a);var d=this;this.element.bind("remove."+this.widgetName,function(){d.destroy()});this._create();this._trigger("create");this._init()},_getCreateOptions:function(){return b.metadata&&b.metadata.get(this.element[0])[this.widgetName]},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName);this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+
"-disabled ui-state-disabled")},widget:function(){return this.element},option:function(a,c){var d=a;if(arguments.length===0)return b.extend({},this.options);if(typeof a==="string"){if(c===j)return this.options[a];d={};d[a]=c}this._setOptions(d);return this},_setOptions:function(a){var c=this;b.each(a,function(d,e){c._setOption(d,e)});return this},_setOption:function(a,c){this.options[a]=c;if(a==="disabled")this.widget()[c?"addClass":"removeClass"](this.widgetBaseClass+"-disabled ui-state-disabled").attr("aria-disabled",
c);return this},enable:function(){return this._setOption("disabled",false)},disable:function(){return this._setOption("disabled",true)},_trigger:function(a,c,d){var e=this.options[a];c=b.Event(c);c.type=(a===this.widgetEventPrefix?a:this.widgetEventPrefix+a).toLowerCase();d=d||{};if(c.originalEvent){a=b.event.props.length;for(var f;a;){f=b.event.props[--a];c[f]=c.originalEvent[f]}}this.element.trigger(c,d);return!(b.isFunction(e)&&e.call(this.element[0],c,d)===false||c.isDefaultPrevented())}}})(jQuery);
;/*
 * jQuery UI Datepicker 1.8.16
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Datepicker
 *
 * Depends:
 *	jquery.ui.core.js
 */
(function(d,C){function M(){this.debug=false;this._curInst=null;this._keyEvent=false;this._disabledInputs=[];this._inDialog=this._datepickerShowing=false;this._mainDivId="ui-datepicker-div";this._inlineClass="ui-datepicker-inline";this._appendClass="ui-datepicker-append";this._triggerClass="ui-datepicker-trigger";this._dialogClass="ui-datepicker-dialog";this._disableClass="ui-datepicker-disabled";this._unselectableClass="ui-datepicker-unselectable";this._currentClass="ui-datepicker-current-day";this._dayOverClass=
"ui-datepicker-days-cell-over";this.regional=[];this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su",
"Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:false,showMonthAfterYear:false,yearSuffix:""};this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:false,hideIfNoPrevNext:false,navigationAsDateFormat:false,gotoCurrent:false,changeMonth:false,changeYear:false,yearRange:"c-10:c+10",showOtherMonths:false,selectOtherMonths:false,showWeek:false,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",
minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:true,showButtonPanel:false,autoSize:false,disabled:false};d.extend(this._defaults,this.regional[""]);this.dpDiv=N(d('<div id="'+this._mainDivId+'" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>'))}function N(a){return a.bind("mouseout",
function(b){b=d(b.target).closest("button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a");b.length&&b.removeClass("ui-state-hover ui-datepicker-prev-hover ui-datepicker-next-hover")}).bind("mouseover",function(b){b=d(b.target).closest("button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a");if(!(d.datepicker._isDisabledDatepicker(J.inline?a.parent()[0]:J.input[0])||!b.length)){b.parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover");
b.addClass("ui-state-hover");b.hasClass("ui-datepicker-prev")&&b.addClass("ui-datepicker-prev-hover");b.hasClass("ui-datepicker-next")&&b.addClass("ui-datepicker-next-hover")}})}function H(a,b){d.extend(a,b);for(var c in b)if(b[c]==null||b[c]==C)a[c]=b[c];return a}d.extend(d.ui,{datepicker:{version:"1.8.16"}});var B=(new Date).getTime(),J;d.extend(M.prototype,{markerClassName:"hasDatepicker",maxRows:4,log:function(){this.debug&&console.log.apply("",arguments)},_widgetDatepicker:function(){return this.dpDiv},
setDefaults:function(a){H(this._defaults,a||{});return this},_attachDatepicker:function(a,b){var c=null;for(var e in this._defaults){var f=a.getAttribute("date:"+e);if(f){c=c||{};try{c[e]=eval(f)}catch(h){c[e]=f}}}e=a.nodeName.toLowerCase();f=e=="div"||e=="span";if(!a.id){this.uuid+=1;a.id="dp"+this.uuid}var i=this._newInst(d(a),f);i.settings=d.extend({},b||{},c||{});if(e=="input")this._connectDatepicker(a,i);else f&&this._inlineDatepicker(a,i)},_newInst:function(a,b){return{id:a[0].id.replace(/([^A-Za-z0-9_-])/g,
"\\\\$1"),input:a,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:b,dpDiv:!b?this.dpDiv:N(d('<div class="'+this._inlineClass+' ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>'))}},_connectDatepicker:function(a,b){var c=d(a);b.append=d([]);b.trigger=d([]);if(!c.hasClass(this.markerClassName)){this._attachments(c,b);c.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp).bind("setData.datepicker",
function(e,f,h){b.settings[f]=h}).bind("getData.datepicker",function(e,f){return this._get(b,f)});this._autoSize(b);d.data(a,"datepicker",b);b.settings.disabled&&this._disableDatepicker(a)}},_attachments:function(a,b){var c=this._get(b,"appendText"),e=this._get(b,"isRTL");b.append&&b.append.remove();if(c){b.append=d('<span class="'+this._appendClass+'">'+c+"</span>");a[e?"before":"after"](b.append)}a.unbind("focus",this._showDatepicker);b.trigger&&b.trigger.remove();c=this._get(b,"showOn");if(c==
"focus"||c=="both")a.focus(this._showDatepicker);if(c=="button"||c=="both"){c=this._get(b,"buttonText");var f=this._get(b,"buttonImage");b.trigger=d(this._get(b,"buttonImageOnly")?d("<img/>").addClass(this._triggerClass).attr({src:f,alt:c,title:c}):d('<button type="button"></button>').addClass(this._triggerClass).html(f==""?c:d("<img/>").attr({src:f,alt:c,title:c})));a[e?"before":"after"](b.trigger);b.trigger.click(function(){d.datepicker._datepickerShowing&&d.datepicker._lastInput==a[0]?d.datepicker._hideDatepicker():
d.datepicker._showDatepicker(a[0]);return false})}},_autoSize:function(a){if(this._get(a,"autoSize")&&!a.inline){var b=new Date(2009,11,20),c=this._get(a,"dateFormat");if(c.match(/[DM]/)){var e=function(f){for(var h=0,i=0,g=0;g<f.length;g++)if(f[g].length>h){h=f[g].length;i=g}return i};b.setMonth(e(this._get(a,c.match(/MM/)?"monthNames":"monthNamesShort")));b.setDate(e(this._get(a,c.match(/DD/)?"dayNames":"dayNamesShort"))+20-b.getDay())}a.input.attr("size",this._formatDate(a,b).length)}},_inlineDatepicker:function(a,
b){var c=d(a);if(!c.hasClass(this.markerClassName)){c.addClass(this.markerClassName).append(b.dpDiv).bind("setData.datepicker",function(e,f,h){b.settings[f]=h}).bind("getData.datepicker",function(e,f){return this._get(b,f)});d.data(a,"datepicker",b);this._setDate(b,this._getDefaultDate(b),true);this._updateDatepicker(b);this._updateAlternate(b);b.settings.disabled&&this._disableDatepicker(a);b.dpDiv.css("display","block")}},_dialogDatepicker:function(a,b,c,e,f){a=this._dialogInst;if(!a){this.uuid+=
1;this._dialogInput=d('<input type="text" id="'+("dp"+this.uuid)+'" style="position: absolute; top: -100px; width: 0px; z-index: -10;"/>');this._dialogInput.keydown(this._doKeyDown);d("body").append(this._dialogInput);a=this._dialogInst=this._newInst(this._dialogInput,false);a.settings={};d.data(this._dialogInput[0],"datepicker",a)}H(a.settings,e||{});b=b&&b.constructor==Date?this._formatDate(a,b):b;this._dialogInput.val(b);this._pos=f?f.length?f:[f.pageX,f.pageY]:null;if(!this._pos)this._pos=[document.documentElement.clientWidth/
2-100+(document.documentElement.scrollLeft||document.body.scrollLeft),document.documentElement.clientHeight/2-150+(document.documentElement.scrollTop||document.body.scrollTop)];this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px");a.settings.onSelect=c;this._inDialog=true;this.dpDiv.addClass(this._dialogClass);this._showDatepicker(this._dialogInput[0]);d.blockUI&&d.blockUI(this.dpDiv);d.data(this._dialogInput[0],"datepicker",a);return this},_destroyDatepicker:function(a){var b=
d(a),c=d.data(a,"datepicker");if(b.hasClass(this.markerClassName)){var e=a.nodeName.toLowerCase();d.removeData(a,"datepicker");if(e=="input"){c.append.remove();c.trigger.remove();b.removeClass(this.markerClassName).unbind("focus",this._showDatepicker).unbind("keydown",this._doKeyDown).unbind("keypress",this._doKeyPress).unbind("keyup",this._doKeyUp)}else if(e=="div"||e=="span")b.removeClass(this.markerClassName).empty()}},_enableDatepicker:function(a){var b=d(a),c=d.data(a,"datepicker");if(b.hasClass(this.markerClassName)){var e=
a.nodeName.toLowerCase();if(e=="input"){a.disabled=false;c.trigger.filter("button").each(function(){this.disabled=false}).end().filter("img").css({opacity:"1.0",cursor:""})}else if(e=="div"||e=="span"){b=b.children("."+this._inlineClass);b.children().removeClass("ui-state-disabled");b.find("select.ui-datepicker-month, select.ui-datepicker-year").removeAttr("disabled")}this._disabledInputs=d.map(this._disabledInputs,function(f){return f==a?null:f})}},_disableDatepicker:function(a){var b=d(a),c=d.data(a,
"datepicker");if(b.hasClass(this.markerClassName)){var e=a.nodeName.toLowerCase();if(e=="input"){a.disabled=true;c.trigger.filter("button").each(function(){this.disabled=true}).end().filter("img").css({opacity:"0.5",cursor:"default"})}else if(e=="div"||e=="span"){b=b.children("."+this._inlineClass);b.children().addClass("ui-state-disabled");b.find("select.ui-datepicker-month, select.ui-datepicker-year").attr("disabled","disabled")}this._disabledInputs=d.map(this._disabledInputs,function(f){return f==
a?null:f});this._disabledInputs[this._disabledInputs.length]=a}},_isDisabledDatepicker:function(a){if(!a)return false;for(var b=0;b<this._disabledInputs.length;b++)if(this._disabledInputs[b]==a)return true;return false},_getInst:function(a){try{return d.data(a,"datepicker")}catch(b){throw"Missing instance data for this datepicker";}},_optionDatepicker:function(a,b,c){var e=this._getInst(a);if(arguments.length==2&&typeof b=="string")return b=="defaults"?d.extend({},d.datepicker._defaults):e?b=="all"?
d.extend({},e.settings):this._get(e,b):null;var f=b||{};if(typeof b=="string"){f={};f[b]=c}if(e){this._curInst==e&&this._hideDatepicker();var h=this._getDateDatepicker(a,true),i=this._getMinMaxDate(e,"min"),g=this._getMinMaxDate(e,"max");H(e.settings,f);if(i!==null&&f.dateFormat!==C&&f.minDate===C)e.settings.minDate=this._formatDate(e,i);if(g!==null&&f.dateFormat!==C&&f.maxDate===C)e.settings.maxDate=this._formatDate(e,g);this._attachments(d(a),e);this._autoSize(e);this._setDate(e,h);this._updateAlternate(e);
this._updateDatepicker(e)}},_changeDatepicker:function(a,b,c){this._optionDatepicker(a,b,c)},_refreshDatepicker:function(a){(a=this._getInst(a))&&this._updateDatepicker(a)},_setDateDatepicker:function(a,b){if(a=this._getInst(a)){this._setDate(a,b);this._updateDatepicker(a);this._updateAlternate(a)}},_getDateDatepicker:function(a,b){(a=this._getInst(a))&&!a.inline&&this._setDateFromField(a,b);return a?this._getDate(a):null},_doKeyDown:function(a){var b=d.datepicker._getInst(a.target),c=true,e=b.dpDiv.is(".ui-datepicker-rtl");
b._keyEvent=true;if(d.datepicker._datepickerShowing)switch(a.keyCode){case 9:d.datepicker._hideDatepicker();c=false;break;case 13:c=d("td."+d.datepicker._dayOverClass+":not(."+d.datepicker._currentClass+")",b.dpDiv);c[0]&&d.datepicker._selectDay(a.target,b.selectedMonth,b.selectedYear,c[0]);if(a=d.datepicker._get(b,"onSelect")){c=d.datepicker._formatDate(b);a.apply(b.input?b.input[0]:null,[c,b])}else d.datepicker._hideDatepicker();return false;case 27:d.datepicker._hideDatepicker();break;case 33:d.datepicker._adjustDate(a.target,
a.ctrlKey?-d.datepicker._get(b,"stepBigMonths"):-d.datepicker._get(b,"stepMonths"),"M");break;case 34:d.datepicker._adjustDate(a.target,a.ctrlKey?+d.datepicker._get(b,"stepBigMonths"):+d.datepicker._get(b,"stepMonths"),"M");break;case 35:if(a.ctrlKey||a.metaKey)d.datepicker._clearDate(a.target);c=a.ctrlKey||a.metaKey;break;case 36:if(a.ctrlKey||a.metaKey)d.datepicker._gotoToday(a.target);c=a.ctrlKey||a.metaKey;break;case 37:if(a.ctrlKey||a.metaKey)d.datepicker._adjustDate(a.target,e?+1:-1,"D");c=
a.ctrlKey||a.metaKey;if(a.originalEvent.altKey)d.datepicker._adjustDate(a.target,a.ctrlKey?-d.datepicker._get(b,"stepBigMonths"):-d.datepicker._get(b,"stepMonths"),"M");break;case 38:if(a.ctrlKey||a.metaKey)d.datepicker._adjustDate(a.target,-7,"D");c=a.ctrlKey||a.metaKey;break;case 39:if(a.ctrlKey||a.metaKey)d.datepicker._adjustDate(a.target,e?-1:+1,"D");c=a.ctrlKey||a.metaKey;if(a.originalEvent.altKey)d.datepicker._adjustDate(a.target,a.ctrlKey?+d.datepicker._get(b,"stepBigMonths"):+d.datepicker._get(b,
"stepMonths"),"M");break;case 40:if(a.ctrlKey||a.metaKey)d.datepicker._adjustDate(a.target,+7,"D");c=a.ctrlKey||a.metaKey;break;default:c=false}else if(a.keyCode==36&&a.ctrlKey)d.datepicker._showDatepicker(this);else c=false;if(c){a.preventDefault();a.stopPropagation()}},_doKeyPress:function(a){var b=d.datepicker._getInst(a.target);if(d.datepicker._get(b,"constrainInput")){b=d.datepicker._possibleChars(d.datepicker._get(b,"dateFormat"));var c=String.fromCharCode(a.charCode==C?a.keyCode:a.charCode);
return a.ctrlKey||a.metaKey||c<" "||!b||b.indexOf(c)>-1}},_doKeyUp:function(a){a=d.datepicker._getInst(a.target);if(a.input.val()!=a.lastVal)try{if(d.datepicker.parseDate(d.datepicker._get(a,"dateFormat"),a.input?a.input.val():null,d.datepicker._getFormatConfig(a))){d.datepicker._setDateFromField(a);d.datepicker._updateAlternate(a);d.datepicker._updateDatepicker(a)}}catch(b){d.datepicker.log(b)}return true},_showDatepicker:function(a){a=a.target||a;if(a.nodeName.toLowerCase()!="input")a=d("input",
a.parentNode)[0];if(!(d.datepicker._isDisabledDatepicker(a)||d.datepicker._lastInput==a)){var b=d.datepicker._getInst(a);if(d.datepicker._curInst&&d.datepicker._curInst!=b){d.datepicker._datepickerShowing&&d.datepicker._triggerOnClose(d.datepicker._curInst);d.datepicker._curInst.dpDiv.stop(true,true)}var c=d.datepicker._get(b,"beforeShow");c=c?c.apply(a,[a,b]):{};if(c!==false){H(b.settings,c);b.lastVal=null;d.datepicker._lastInput=a;d.datepicker._setDateFromField(b);if(d.datepicker._inDialog)a.value=
"";if(!d.datepicker._pos){d.datepicker._pos=d.datepicker._findPos(a);d.datepicker._pos[1]+=a.offsetHeight}var e=false;d(a).parents().each(function(){e|=d(this).css("position")=="fixed";return!e});if(e&&d.browser.opera){d.datepicker._pos[0]-=document.documentElement.scrollLeft;d.datepicker._pos[1]-=document.documentElement.scrollTop}c={left:d.datepicker._pos[0],top:d.datepicker._pos[1]};d.datepicker._pos=null;b.dpDiv.empty();b.dpDiv.css({position:"absolute",display:"block",top:"-1000px"});d.datepicker._updateDatepicker(b);
c=d.datepicker._checkOffset(b,c,e);b.dpDiv.css({position:d.datepicker._inDialog&&d.blockUI?"static":e?"fixed":"absolute",display:"none",left:c.left+"px",top:c.top+"px"});if(!b.inline){c=d.datepicker._get(b,"showAnim");var f=d.datepicker._get(b,"duration"),h=function(){var i=b.dpDiv.find("iframe.ui-datepicker-cover");if(i.length){var g=d.datepicker._getBorders(b.dpDiv);i.css({left:-g[0],top:-g[1],width:b.dpDiv.outerWidth(),height:b.dpDiv.outerHeight()})}};b.dpDiv.zIndex(d(a).zIndex()+1);d.datepicker._datepickerShowing=
true;d.effects&&d.effects[c]?b.dpDiv.show(c,d.datepicker._get(b,"showOptions"),f,h):b.dpDiv[c||"show"](c?f:null,h);if(!c||!f)h();b.input.is(":visible")&&!b.input.is(":disabled")&&b.input.focus();d.datepicker._curInst=b}}}},_updateDatepicker:function(a){this.maxRows=4;var b=d.datepicker._getBorders(a.dpDiv);J=a;a.dpDiv.empty().append(this._generateHTML(a));var c=a.dpDiv.find("iframe.ui-datepicker-cover");c.length&&c.css({left:-b[0],top:-b[1],width:a.dpDiv.outerWidth(),height:a.dpDiv.outerHeight()});
a.dpDiv.find("."+this._dayOverClass+" a").mouseover();b=this._getNumberOfMonths(a);c=b[1];a.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width("");c>1&&a.dpDiv.addClass("ui-datepicker-multi-"+c).css("width",17*c+"em");a.dpDiv[(b[0]!=1||b[1]!=1?"add":"remove")+"Class"]("ui-datepicker-multi");a.dpDiv[(this._get(a,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl");a==d.datepicker._curInst&&d.datepicker._datepickerShowing&&a.input&&a.input.is(":visible")&&
!a.input.is(":disabled")&&a.input[0]!=document.activeElement&&a.input.focus();if(a.yearshtml){var e=a.yearshtml;setTimeout(function(){e===a.yearshtml&&a.yearshtml&&a.dpDiv.find("select.ui-datepicker-year:first").replaceWith(a.yearshtml);e=a.yearshtml=null},0)}},_getBorders:function(a){var b=function(c){return{thin:1,medium:2,thick:3}[c]||c};return[parseFloat(b(a.css("border-left-width"))),parseFloat(b(a.css("border-top-width")))]},_checkOffset:function(a,b,c){var e=a.dpDiv.outerWidth(),f=a.dpDiv.outerHeight(),
h=a.input?a.input.outerWidth():0,i=a.input?a.input.outerHeight():0,g=document.documentElement.clientWidth+d(document).scrollLeft(),j=document.documentElement.clientHeight+d(document).scrollTop();b.left-=this._get(a,"isRTL")?e-h:0;b.left-=c&&b.left==a.input.offset().left?d(document).scrollLeft():0;b.top-=c&&b.top==a.input.offset().top+i?d(document).scrollTop():0;b.left-=Math.min(b.left,b.left+e>g&&g>e?Math.abs(b.left+e-g):0);b.top-=Math.min(b.top,b.top+f>j&&j>f?Math.abs(f+i):0);return b},_findPos:function(a){for(var b=
this._get(this._getInst(a),"isRTL");a&&(a.type=="hidden"||a.nodeType!=1||d.expr.filters.hidden(a));)a=a[b?"previousSibling":"nextSibling"];a=d(a).offset();return[a.left,a.top]},_triggerOnClose:function(a){var b=this._get(a,"onClose");if(b)b.apply(a.input?a.input[0]:null,[a.input?a.input.val():"",a])},_hideDatepicker:function(a){var b=this._curInst;if(!(!b||a&&b!=d.data(a,"datepicker")))if(this._datepickerShowing){a=this._get(b,"showAnim");var c=this._get(b,"duration"),e=function(){d.datepicker._tidyDialog(b);
this._curInst=null};d.effects&&d.effects[a]?b.dpDiv.hide(a,d.datepicker._get(b,"showOptions"),c,e):b.dpDiv[a=="slideDown"?"slideUp":a=="fadeIn"?"fadeOut":"hide"](a?c:null,e);a||e();d.datepicker._triggerOnClose(b);this._datepickerShowing=false;this._lastInput=null;if(this._inDialog){this._dialogInput.css({position:"absolute",left:"0",top:"-100px"});if(d.blockUI){d.unblockUI();d("body").append(this.dpDiv)}}this._inDialog=false}},_tidyDialog:function(a){a.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")},
_checkExternalClick:function(a){if(d.datepicker._curInst){a=d(a.target);a[0].id!=d.datepicker._mainDivId&&a.parents("#"+d.datepicker._mainDivId).length==0&&!a.hasClass(d.datepicker.markerClassName)&&!a.hasClass(d.datepicker._triggerClass)&&d.datepicker._datepickerShowing&&!(d.datepicker._inDialog&&d.blockUI)&&d.datepicker._hideDatepicker()}},_adjustDate:function(a,b,c){a=d(a);var e=this._getInst(a[0]);if(!this._isDisabledDatepicker(a[0])){this._adjustInstDate(e,b+(c=="M"?this._get(e,"showCurrentAtPos"):
0),c);this._updateDatepicker(e)}},_gotoToday:function(a){a=d(a);var b=this._getInst(a[0]);if(this._get(b,"gotoCurrent")&&b.currentDay){b.selectedDay=b.currentDay;b.drawMonth=b.selectedMonth=b.currentMonth;b.drawYear=b.selectedYear=b.currentYear}else{var c=new Date;b.selectedDay=c.getDate();b.drawMonth=b.selectedMonth=c.getMonth();b.drawYear=b.selectedYear=c.getFullYear()}this._notifyChange(b);this._adjustDate(a)},_selectMonthYear:function(a,b,c){a=d(a);var e=this._getInst(a[0]);e["selected"+(c=="M"?
"Month":"Year")]=e["draw"+(c=="M"?"Month":"Year")]=parseInt(b.options[b.selectedIndex].value,10);this._notifyChange(e);this._adjustDate(a)},_selectDay:function(a,b,c,e){var f=d(a);if(!(d(e).hasClass(this._unselectableClass)||this._isDisabledDatepicker(f[0]))){f=this._getInst(f[0]);f.selectedDay=f.currentDay=d("a",e).html();f.selectedMonth=f.currentMonth=b;f.selectedYear=f.currentYear=c;this._selectDate(a,this._formatDate(f,f.currentDay,f.currentMonth,f.currentYear))}},_clearDate:function(a){a=d(a);
this._getInst(a[0]);this._selectDate(a,"")},_selectDate:function(a,b){a=this._getInst(d(a)[0]);b=b!=null?b:this._formatDate(a);a.input&&a.input.val(b);this._updateAlternate(a);var c=this._get(a,"onSelect");if(c)c.apply(a.input?a.input[0]:null,[b,a]);else a.input&&a.input.trigger("change");if(a.inline)this._updateDatepicker(a);else{this._hideDatepicker();this._lastInput=a.input[0];typeof a.input[0]!="object"&&a.input.focus();this._lastInput=null}},_updateAlternate:function(a){var b=this._get(a,"altField");
if(b){var c=this._get(a,"altFormat")||this._get(a,"dateFormat"),e=this._getDate(a),f=this.formatDate(c,e,this._getFormatConfig(a));d(b).each(function(){d(this).val(f)})}},noWeekends:function(a){a=a.getDay();return[a>0&&a<6,""]},iso8601Week:function(a){a=new Date(a.getTime());a.setDate(a.getDate()+4-(a.getDay()||7));var b=a.getTime();a.setMonth(0);a.setDate(1);return Math.floor(Math.round((b-a)/864E5)/7)+1},parseDate:function(a,b,c){if(a==null||b==null)throw"Invalid arguments";b=typeof b=="object"?
b.toString():b+"";if(b=="")return null;var e=(c?c.shortYearCutoff:null)||this._defaults.shortYearCutoff;e=typeof e!="string"?e:(new Date).getFullYear()%100+parseInt(e,10);for(var f=(c?c.dayNamesShort:null)||this._defaults.dayNamesShort,h=(c?c.dayNames:null)||this._defaults.dayNames,i=(c?c.monthNamesShort:null)||this._defaults.monthNamesShort,g=(c?c.monthNames:null)||this._defaults.monthNames,j=c=-1,l=-1,u=-1,k=false,o=function(p){(p=A+1<a.length&&a.charAt(A+1)==p)&&A++;return p},m=function(p){var D=
o(p);p=new RegExp("^\\d{1,"+(p=="@"?14:p=="!"?20:p=="y"&&D?4:p=="o"?3:2)+"}");p=b.substring(q).match(p);if(!p)throw"Missing number at position "+q;q+=p[0].length;return parseInt(p[0],10)},n=function(p,D,K){p=d.map(o(p)?K:D,function(w,x){return[[x,w]]}).sort(function(w,x){return-(w[1].length-x[1].length)});var E=-1;d.each(p,function(w,x){w=x[1];if(b.substr(q,w.length).toLowerCase()==w.toLowerCase()){E=x[0];q+=w.length;return false}});if(E!=-1)return E+1;else throw"Unknown name at position "+q;},s=
function(){if(b.charAt(q)!=a.charAt(A))throw"Unexpected literal at position "+q;q++},q=0,A=0;A<a.length;A++)if(k)if(a.charAt(A)=="'"&&!o("'"))k=false;else s();else switch(a.charAt(A)){case "d":l=m("d");break;case "D":n("D",f,h);break;case "o":u=m("o");break;case "m":j=m("m");break;case "M":j=n("M",i,g);break;case "y":c=m("y");break;case "@":var v=new Date(m("@"));c=v.getFullYear();j=v.getMonth()+1;l=v.getDate();break;case "!":v=new Date((m("!")-this._ticksTo1970)/1E4);c=v.getFullYear();j=v.getMonth()+
1;l=v.getDate();break;case "'":if(o("'"))s();else k=true;break;default:s()}if(q<b.length)throw"Extra/unparsed characters found in date: "+b.substring(q);if(c==-1)c=(new Date).getFullYear();else if(c<100)c+=(new Date).getFullYear()-(new Date).getFullYear()%100+(c<=e?0:-100);if(u>-1){j=1;l=u;do{e=this._getDaysInMonth(c,j-1);if(l<=e)break;j++;l-=e}while(1)}v=this._daylightSavingAdjust(new Date(c,j-1,l));if(v.getFullYear()!=c||v.getMonth()+1!=j||v.getDate()!=l)throw"Invalid date";return v},ATOM:"yy-mm-dd",
COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925))*24*60*60*1E7,formatDate:function(a,b,c){if(!b)return"";var e=(c?c.dayNamesShort:null)||this._defaults.dayNamesShort,f=(c?c.dayNames:null)||this._defaults.dayNames,h=(c?c.monthNamesShort:null)||this._defaults.monthNamesShort;c=(c?c.monthNames:
null)||this._defaults.monthNames;var i=function(o){(o=k+1<a.length&&a.charAt(k+1)==o)&&k++;return o},g=function(o,m,n){m=""+m;if(i(o))for(;m.length<n;)m="0"+m;return m},j=function(o,m,n,s){return i(o)?s[m]:n[m]},l="",u=false;if(b)for(var k=0;k<a.length;k++)if(u)if(a.charAt(k)=="'"&&!i("'"))u=false;else l+=a.charAt(k);else switch(a.charAt(k)){case "d":l+=g("d",b.getDate(),2);break;case "D":l+=j("D",b.getDay(),e,f);break;case "o":l+=g("o",Math.round(((new Date(b.getFullYear(),b.getMonth(),b.getDate())).getTime()-
(new Date(b.getFullYear(),0,0)).getTime())/864E5),3);break;case "m":l+=g("m",b.getMonth()+1,2);break;case "M":l+=j("M",b.getMonth(),h,c);break;case "y":l+=i("y")?b.getFullYear():(b.getYear()%100<10?"0":"")+b.getYear()%100;break;case "@":l+=b.getTime();break;case "!":l+=b.getTime()*1E4+this._ticksTo1970;break;case "'":if(i("'"))l+="'";else u=true;break;default:l+=a.charAt(k)}return l},_possibleChars:function(a){for(var b="",c=false,e=function(h){(h=f+1<a.length&&a.charAt(f+1)==h)&&f++;return h},f=
0;f<a.length;f++)if(c)if(a.charAt(f)=="'"&&!e("'"))c=false;else b+=a.charAt(f);else switch(a.charAt(f)){case "d":case "m":case "y":case "@":b+="0123456789";break;case "D":case "M":return null;case "'":if(e("'"))b+="'";else c=true;break;default:b+=a.charAt(f)}return b},_get:function(a,b){return a.settings[b]!==C?a.settings[b]:this._defaults[b]},_setDateFromField:function(a,b){if(a.input.val()!=a.lastVal){var c=this._get(a,"dateFormat"),e=a.lastVal=a.input?a.input.val():null,f,h;f=h=this._getDefaultDate(a);
var i=this._getFormatConfig(a);try{f=this.parseDate(c,e,i)||h}catch(g){this.log(g);e=b?"":e}a.selectedDay=f.getDate();a.drawMonth=a.selectedMonth=f.getMonth();a.drawYear=a.selectedYear=f.getFullYear();a.currentDay=e?f.getDate():0;a.currentMonth=e?f.getMonth():0;a.currentYear=e?f.getFullYear():0;this._adjustInstDate(a)}},_getDefaultDate:function(a){return this._restrictMinMax(a,this._determineDate(a,this._get(a,"defaultDate"),new Date))},_determineDate:function(a,b,c){var e=function(h){var i=new Date;
i.setDate(i.getDate()+h);return i},f=function(h){try{return d.datepicker.parseDate(d.datepicker._get(a,"dateFormat"),h,d.datepicker._getFormatConfig(a))}catch(i){}var g=(h.toLowerCase().match(/^c/)?d.datepicker._getDate(a):null)||new Date,j=g.getFullYear(),l=g.getMonth();g=g.getDate();for(var u=/([+-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,k=u.exec(h);k;){switch(k[2]||"d"){case "d":case "D":g+=parseInt(k[1],10);break;case "w":case "W":g+=parseInt(k[1],10)*7;break;case "m":case "M":l+=parseInt(k[1],10);g=
Math.min(g,d.datepicker._getDaysInMonth(j,l));break;case "y":case "Y":j+=parseInt(k[1],10);g=Math.min(g,d.datepicker._getDaysInMonth(j,l));break}k=u.exec(h)}return new Date(j,l,g)};if(b=(b=b==null||b===""?c:typeof b=="string"?f(b):typeof b=="number"?isNaN(b)?c:e(b):new Date(b.getTime()))&&b.toString()=="Invalid Date"?c:b){b.setHours(0);b.setMinutes(0);b.setSeconds(0);b.setMilliseconds(0)}return this._daylightSavingAdjust(b)},_daylightSavingAdjust:function(a){if(!a)return null;a.setHours(a.getHours()>
12?a.getHours()+2:0);return a},_setDate:function(a,b,c){var e=!b,f=a.selectedMonth,h=a.selectedYear;b=this._restrictMinMax(a,this._determineDate(a,b,new Date));a.selectedDay=a.currentDay=b.getDate();a.drawMonth=a.selectedMonth=a.currentMonth=b.getMonth();a.drawYear=a.selectedYear=a.currentYear=b.getFullYear();if((f!=a.selectedMonth||h!=a.selectedYear)&&!c)this._notifyChange(a);this._adjustInstDate(a);if(a.input)a.input.val(e?"":this._formatDate(a))},_getDate:function(a){return!a.currentYear||a.input&&
a.input.val()==""?null:this._daylightSavingAdjust(new Date(a.currentYear,a.currentMonth,a.currentDay))},_generateHTML:function(a){var b=new Date;b=this._daylightSavingAdjust(new Date(b.getFullYear(),b.getMonth(),b.getDate()));var c=this._get(a,"isRTL"),e=this._get(a,"showButtonPanel"),f=this._get(a,"hideIfNoPrevNext"),h=this._get(a,"navigationAsDateFormat"),i=this._getNumberOfMonths(a),g=this._get(a,"showCurrentAtPos"),j=this._get(a,"stepMonths"),l=i[0]!=1||i[1]!=1,u=this._daylightSavingAdjust(!a.currentDay?
new Date(9999,9,9):new Date(a.currentYear,a.currentMonth,a.currentDay)),k=this._getMinMaxDate(a,"min"),o=this._getMinMaxDate(a,"max");g=a.drawMonth-g;var m=a.drawYear;if(g<0){g+=12;m--}if(o){var n=this._daylightSavingAdjust(new Date(o.getFullYear(),o.getMonth()-i[0]*i[1]+1,o.getDate()));for(n=k&&n<k?k:n;this._daylightSavingAdjust(new Date(m,g,1))>n;){g--;if(g<0){g=11;m--}}}a.drawMonth=g;a.drawYear=m;n=this._get(a,"prevText");n=!h?n:this.formatDate(n,this._daylightSavingAdjust(new Date(m,g-j,1)),this._getFormatConfig(a));
n=this._canAdjustMonth(a,-1,m,g)?'<a class="ui-datepicker-prev ui-corner-all" onclick="DP_jQuery_'+B+".datepicker._adjustDate('#"+a.id+"', -"+j+", 'M');\" title=\""+n+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"e":"w")+'">'+n+"</span></a>":f?"":'<a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="'+n+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"e":"w")+'">'+n+"</span></a>";var s=this._get(a,"nextText");s=!h?s:this.formatDate(s,this._daylightSavingAdjust(new Date(m,
g+j,1)),this._getFormatConfig(a));f=this._canAdjustMonth(a,+1,m,g)?'<a class="ui-datepicker-next ui-corner-all" onclick="DP_jQuery_'+B+".datepicker._adjustDate('#"+a.id+"', +"+j+", 'M');\" title=\""+s+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"w":"e")+'">'+s+"</span></a>":f?"":'<a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="'+s+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"w":"e")+'">'+s+"</span></a>";j=this._get(a,"currentText");s=this._get(a,"gotoCurrent")&&
a.currentDay?u:b;j=!h?j:this.formatDate(j,s,this._getFormatConfig(a));h=!a.inline?'<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all" onclick="DP_jQuery_'+B+'.datepicker._hideDatepicker();">'+this._get(a,"closeText")+"</button>":"";e=e?'<div class="ui-datepicker-buttonpane ui-widget-content">'+(c?h:"")+(this._isInRange(a,s)?'<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all" onclick="DP_jQuery_'+
B+".datepicker._gotoToday('#"+a.id+"');\">"+j+"</button>":"")+(c?"":h)+"</div>":"";h=parseInt(this._get(a,"firstDay"),10);h=isNaN(h)?0:h;j=this._get(a,"showWeek");s=this._get(a,"dayNames");this._get(a,"dayNamesShort");var q=this._get(a,"dayNamesMin"),A=this._get(a,"monthNames"),v=this._get(a,"monthNamesShort"),p=this._get(a,"beforeShowDay"),D=this._get(a,"showOtherMonths"),K=this._get(a,"selectOtherMonths");this._get(a,"calculateWeek");for(var E=this._getDefaultDate(a),w="",x=0;x<i[0];x++){var O=
"";this.maxRows=4;for(var G=0;G<i[1];G++){var P=this._daylightSavingAdjust(new Date(m,g,a.selectedDay)),t=" ui-corner-all",y="";if(l){y+='<div class="ui-datepicker-group';if(i[1]>1)switch(G){case 0:y+=" ui-datepicker-group-first";t=" ui-corner-"+(c?"right":"left");break;case i[1]-1:y+=" ui-datepicker-group-last";t=" ui-corner-"+(c?"left":"right");break;default:y+=" ui-datepicker-group-middle";t="";break}y+='">'}y+='<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix'+t+'">'+(/all|left/.test(t)&&
x==0?c?f:n:"")+(/all|right/.test(t)&&x==0?c?n:f:"")+this._generateMonthYearHeader(a,g,m,k,o,x>0||G>0,A,v)+'</div><table class="ui-datepicker-calendar"><thead><tr>';var z=j?'<th class="ui-datepicker-week-col">'+this._get(a,"weekHeader")+"</th>":"";for(t=0;t<7;t++){var r=(t+h)%7;z+="<th"+((t+h+6)%7>=5?' class="ui-datepicker-week-end"':"")+'><span title="'+s[r]+'">'+q[r]+"</span></th>"}y+=z+"</tr></thead><tbody>";z=this._getDaysInMonth(m,g);if(m==a.selectedYear&&g==a.selectedMonth)a.selectedDay=Math.min(a.selectedDay,
z);t=(this._getFirstDayOfMonth(m,g)-h+7)%7;z=Math.ceil((t+z)/7);this.maxRows=z=l?this.maxRows>z?this.maxRows:z:z;r=this._daylightSavingAdjust(new Date(m,g,1-t));for(var Q=0;Q<z;Q++){y+="<tr>";var R=!j?"":'<td class="ui-datepicker-week-col">'+this._get(a,"calculateWeek")(r)+"</td>";for(t=0;t<7;t++){var I=p?p.apply(a.input?a.input[0]:null,[r]):[true,""],F=r.getMonth()!=g,L=F&&!K||!I[0]||k&&r<k||o&&r>o;R+='<td class="'+((t+h+6)%7>=5?" ui-datepicker-week-end":"")+(F?" ui-datepicker-other-month":"")+(r.getTime()==
P.getTime()&&g==a.selectedMonth&&a._keyEvent||E.getTime()==r.getTime()&&E.getTime()==P.getTime()?" "+this._dayOverClass:"")+(L?" "+this._unselectableClass+" ui-state-disabled":"")+(F&&!D?"":" "+I[1]+(r.getTime()==u.getTime()?" "+this._currentClass:"")+(r.getTime()==b.getTime()?" ui-datepicker-today":""))+'"'+((!F||D)&&I[2]?' title="'+I[2]+'"':"")+(L?"":' onclick="DP_jQuery_'+B+".datepicker._selectDay('#"+a.id+"',"+r.getMonth()+","+r.getFullYear()+', this);return false;"')+">"+(F&&!D?"&#xa0;":L?'<span class="ui-state-default">'+
r.getDate()+"</span>":'<a class="ui-state-default'+(r.getTime()==b.getTime()?" ui-state-highlight":"")+(r.getTime()==u.getTime()?" ui-state-active":"")+(F?" ui-priority-secondary":"")+'" href="#">'+r.getDate()+"</a>")+"</td>";r.setDate(r.getDate()+1);r=this._daylightSavingAdjust(r)}y+=R+"</tr>"}g++;if(g>11){g=0;m++}y+="</tbody></table>"+(l?"</div>"+(i[0]>0&&G==i[1]-1?'<div class="ui-datepicker-row-break"></div>':""):"");O+=y}w+=O}w+=e+(d.browser.msie&&parseInt(d.browser.version,10)<7&&!a.inline?'<iframe src="javascript:false;" class="ui-datepicker-cover" frameborder="0"></iframe>':
"");a._keyEvent=false;return w},_generateMonthYearHeader:function(a,b,c,e,f,h,i,g){var j=this._get(a,"changeMonth"),l=this._get(a,"changeYear"),u=this._get(a,"showMonthAfterYear"),k='<div class="ui-datepicker-title">',o="";if(h||!j)o+='<span class="ui-datepicker-month">'+i[b]+"</span>";else{i=e&&e.getFullYear()==c;var m=f&&f.getFullYear()==c;o+='<select class="ui-datepicker-month" onchange="DP_jQuery_'+B+".datepicker._selectMonthYear('#"+a.id+"', this, 'M');\" >";for(var n=0;n<12;n++)if((!i||n>=e.getMonth())&&
(!m||n<=f.getMonth()))o+='<option value="'+n+'"'+(n==b?' selected="selected"':"")+">"+g[n]+"</option>";o+="</select>"}u||(k+=o+(h||!(j&&l)?"&#xa0;":""));if(!a.yearshtml){a.yearshtml="";if(h||!l)k+='<span class="ui-datepicker-year">'+c+"</span>";else{g=this._get(a,"yearRange").split(":");var s=(new Date).getFullYear();i=function(q){q=q.match(/c[+-].*/)?c+parseInt(q.substring(1),10):q.match(/[+-].*/)?s+parseInt(q,10):parseInt(q,10);return isNaN(q)?s:q};b=i(g[0]);g=Math.max(b,i(g[1]||""));b=e?Math.max(b,
e.getFullYear()):b;g=f?Math.min(g,f.getFullYear()):g;for(a.yearshtml+='<select class="ui-datepicker-year" onchange="DP_jQuery_'+B+".datepicker._selectMonthYear('#"+a.id+"', this, 'Y');\" >";b<=g;b++)a.yearshtml+='<option value="'+b+'"'+(b==c?' selected="selected"':"")+">"+b+"</option>";a.yearshtml+="</select>";k+=a.yearshtml;a.yearshtml=null}}k+=this._get(a,"yearSuffix");if(u)k+=(h||!(j&&l)?"&#xa0;":"")+o;k+="</div>";return k},_adjustInstDate:function(a,b,c){var e=a.drawYear+(c=="Y"?b:0),f=a.drawMonth+
(c=="M"?b:0);b=Math.min(a.selectedDay,this._getDaysInMonth(e,f))+(c=="D"?b:0);e=this._restrictMinMax(a,this._daylightSavingAdjust(new Date(e,f,b)));a.selectedDay=e.getDate();a.drawMonth=a.selectedMonth=e.getMonth();a.drawYear=a.selectedYear=e.getFullYear();if(c=="M"||c=="Y")this._notifyChange(a)},_restrictMinMax:function(a,b){var c=this._getMinMaxDate(a,"min");a=this._getMinMaxDate(a,"max");b=c&&b<c?c:b;return b=a&&b>a?a:b},_notifyChange:function(a){var b=this._get(a,"onChangeMonthYear");if(b)b.apply(a.input?
a.input[0]:null,[a.selectedYear,a.selectedMonth+1,a])},_getNumberOfMonths:function(a){a=this._get(a,"numberOfMonths");return a==null?[1,1]:typeof a=="number"?[1,a]:a},_getMinMaxDate:function(a,b){return this._determineDate(a,this._get(a,b+"Date"),null)},_getDaysInMonth:function(a,b){return 32-this._daylightSavingAdjust(new Date(a,b,32)).getDate()},_getFirstDayOfMonth:function(a,b){return(new Date(a,b,1)).getDay()},_canAdjustMonth:function(a,b,c,e){var f=this._getNumberOfMonths(a);c=this._daylightSavingAdjust(new Date(c,
e+(b<0?b:f[0]*f[1]),1));b<0&&c.setDate(this._getDaysInMonth(c.getFullYear(),c.getMonth()));return this._isInRange(a,c)},_isInRange:function(a,b){var c=this._getMinMaxDate(a,"min");a=this._getMinMaxDate(a,"max");return(!c||b.getTime()>=c.getTime())&&(!a||b.getTime()<=a.getTime())},_getFormatConfig:function(a){var b=this._get(a,"shortYearCutoff");b=typeof b!="string"?b:(new Date).getFullYear()%100+parseInt(b,10);return{shortYearCutoff:b,dayNamesShort:this._get(a,"dayNamesShort"),dayNames:this._get(a,
"dayNames"),monthNamesShort:this._get(a,"monthNamesShort"),monthNames:this._get(a,"monthNames")}},_formatDate:function(a,b,c,e){if(!b){a.currentDay=a.selectedDay;a.currentMonth=a.selectedMonth;a.currentYear=a.selectedYear}b=b?typeof b=="object"?b:this._daylightSavingAdjust(new Date(e,c,b)):this._daylightSavingAdjust(new Date(a.currentYear,a.currentMonth,a.currentDay));return this.formatDate(this._get(a,"dateFormat"),b,this._getFormatConfig(a))}});d.fn.datepicker=function(a){if(!this.length)return this;
if(!d.datepicker.initialized){d(document).mousedown(d.datepicker._checkExternalClick).find("body").append(d.datepicker.dpDiv);d.datepicker.initialized=true}var b=Array.prototype.slice.call(arguments,1);if(typeof a=="string"&&(a=="isDisabled"||a=="getDate"||a=="widget"))return d.datepicker["_"+a+"Datepicker"].apply(d.datepicker,[this[0]].concat(b));if(a=="option"&&arguments.length==2&&typeof arguments[1]=="string")return d.datepicker["_"+a+"Datepicker"].apply(d.datepicker,[this[0]].concat(b));return this.each(function(){typeof a==
"string"?d.datepicker["_"+a+"Datepicker"].apply(d.datepicker,[this].concat(b)):d.datepicker._attachDatepicker(this,a)})};d.datepicker=new M;d.datepicker.initialized=false;d.datepicker.uuid=(new Date).getTime();d.datepicker.version="1.8.16";window["DP_jQuery_"+B]=d})(jQuery);
;/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);jQuery(function($) {

	// FLOATING DESIGNER NAV
	$(window).load(function(){
		$('#le_floatnav').fadeIn();
	});

	// DATE PICKER
	$( ".datepicker" ).datepicker({
		altField: ".datepickeralt",
		altFormat: "DD, d MM, yy",
		showOn: "button",
		buttonImage: wp_js.themeDir+"/functions/im/progress/trigger.png",
		buttonImageOnly: true
	});

	if($('#le_floatnav').length) {
		var adminMenuHeight = $('#adminmenuwrap').height();
		var firstSection = $('.le-section:first').offset().top - 15;

		$('#le_floatnav a').not('#FloatNavCollapse').click(function(e){
			e.preventDefault();
			var designerID = $(this).attr('href');
			var sectionID = $(designerID);
			var sectionScroll = sectionID.offset().top - 57;
			sectionID.parent('.le-title').parent('.le-section').addClass('open');
			sectionID.parent('.le-title').nextAll('.le-sectioncontent').show();
			sectionID.html('&ndash;');
			$.cookie(designerID.substr(1), 'expandered');
			$("html, body").animate({
				scrollTop: sectionScroll
			}, 600);
		});

		$(window).resize(function(){ 
		
			var windowWidth = $(window).width();
				
			if(windowWidth < 1100) {
				$('#le_floatnav').addClass('minimal');
			} else {
				$('#le_floatnav').removeClass('minimal');
			}
	
		}).trigger('resize');			
	}

	// PREMIUM SECTION TEASERS
	$('.le-section').each(function(){
		if($(this).find('.le-input').hasClass('premium-section')) {
			$(this).addClass('premium-section');
			$(this).find('span.submit').hide();
			$(this).find('a.premiumbutton').show();
		} 
	});

	$('.le-input.premium-item').each(function(){
		$(this).find('a.premiumlink').show();
	});

	// MODAL POSITION
	$('.modal-trigger').click(function(){
		var modalPos = $(window).scrollTop() + 70;
		$('.jqmWindow').css('top', modalPos + 'px');
	});

	// Popups
	$('.jqmWindow#selector-info').jqm({trigger: '.modal-trigger', overlay:60});
	$('.jqmWindow#selector-info').jqmAddClose('a.close'); 

	// IE7 AND LOWER POPUP
	if ( $('html').hasClass('ie7') || $('html').hasClass('ie6') ) {
		$('#le-iexploder').show();
	}

	// COLORPICKER
	$('.colorpicker').jPicker({
		window:{expandable: true}
	}).each( function (idx){
		$(this).attr('data-index', idx);
	});

	$('span.jPicker').each( function (idx){
		$(this).attr('data-index', idx);
	});

	$('input.colorpicker, span.jPicker').click( function(){
		$thisElement = $(this);
		var modalPos = $(window).scrollTop() + 70;
	
		$('div.jPicker.Container').css('top', modalPos + 'px').css('z-index', 40);
		$('input.colorpicker').removeClass('active');
		$('input.colorpicker').eq($(this).attr('data-index')).addClass('active');
	});

	$('#stats-wrapper .row-actions a').click( function (){
		action = $(this).attr('class');
		confirmed = false;
		switch(action){
			case "remove":
				confirmed = confirm('This item will be permanently deleted and cannot be recovered. Continue?');
			break;
		}
		if (! confirmed ) return false;
	});

	// ACCORDION
	$('.le-title').click(function(){

		var thisID = $(this).find('span.expand').attr('id');
	
		if($(this).parent('.le-section').hasClass('open')) {
			$(this).parent('.le-section').removeClass('open');
			$(this).nextAll('.le-sectioncontent').hide();
			$(this).find('span.expand').text('+');
			$.cookie(thisID, 'collapsered');
		} else {
			$(this).parent('.le-section').addClass('open');
			$(this).nextAll('.le-sectioncontent').show();
			$(this).find('span.expand').html('&ndash;');
			$.cookie(thisID, 'expandered');
		}
	});

	$('a#collapse-all, a#FloatNavCollapse').click(function(){
		$('.le-section').removeClass('open');
		$('.le-sectioncontent').hide();
		$('span.expand').text('+');
		$.cookie('span.expand', 'collapsered');
		return false;
	});

	var cooky = $.cookie();

	$.each(cooky, function(key, value) {
	
		if(value == 'expandered') {
			$('span.expand#' + key).parent('.le-title').parent('.le-section').addClass('open');
			$('span.expand#' + key).parent('.le-title').nextAll('.le-sectioncontent').show();
			$('span.expand#' + key).html('&ndash;');
		}
	
		if(value == 'collapsered') {
			$('span.expand').parent('.le-title').parent('.le-section').removeClass('open');
			$('span.expand').parent('.le-title').nextAll('.le-sectioncontent').hide();
			$('span.expand').text('+');
		}
	
	});

	// WEBFONT SELECT BOX PREVIEW

	$('.le-select_webfont select').each(function(){
		var selectVal = $(this).find('option:selected').attr('value');
		if(selectVal.length > 0) {
			$(this).parent().children('ul').children('li.' + $(this).find('option:selected').attr('class')).show();
		}
	});

	$('.le-select_webfont select').change(function(){
	
		var selectVal = $(this).find('option:selected').attr('value');
	
		if(selectVal.length > 0) {
			$(this).parent().children('ul').children('li').hide();
			$(this).parent().children('ul').children('li.' + $(this).find('option:selected').attr('class')).show();
		} else {
			$(this).parent().children('ul').children('li').hide();
		}

	});
	
	// PERCENTAGE AFTER TAX INPUT FOR PRODUCT PAGE
	$('.le-tax input').after('%');
	
	// HIDE WORDPRESS FOOTER
	$('#footer').hide();
});
