/* --------------------------------------------------------------------------------
        (W)eb Creations (E)xtended (P)rogramming (I)nterface - WEPI
        JAVASCRIPT RELEASE
        BETA 1.1
        COPYRIGHT ABDUELAZIZ KURT, 5M-Ware 2010-2014(c)
        ------------------------------------------------------------------
        
        GPLv3 or MIT licance for commercial or non-commerical use
        
        ------------------------------------------------------------------
        
        Part of the Web Creations API
        
        ------------------------------------------------------------------
        Note: This is the JavaScript Core File for the Web Creations - API.
   -------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        WEPI-CORE Version
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
      function coreVersion() { return "1.1"; }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        Host URL CheckUp
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
      var host_url = "";
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        Shortcut for elements
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
      function $_id ( idName ) {
            if ( window.XMLHttpRequest ) {
              return document.getElementById(idName);
            } else if ( window.ActiveXObject ) {
              return document.all(idName);
            }
      }
      function $_name ( idName ) {
            if ( window.XMLHttpRequest ) {
              return document.getElementsByName(idName);
            } else if ( window.ActiveXObject ) {
              return document.all(idName);
            }
      }
      function $_css ( idName ) {
            if ( document.getElementById(idName) ) {
			  return document.getElementById(idName).style;
            } else if ( document.all(idName) ) {
              return document.all(idName).style;
            }
      }
      function $_nav () {
          	if( navigator.userAgent ) { return navigator.userAgent; } else 
            if( navigator.appName )   { return navigator.appName; }
          
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        Web 2.0 base function
        HTTP-Request-Call
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
        // This function builds a connection to the server
        // sends a query and returns the responce.
        function wepiServerReq( method, serverSource, params, status ) {
            // Hidden-Tag, which gets the responce
            $_id("wepiServReqTag").innerHTML = "";
            // Success
            var success = false;
            // Connection object
            var xml_http_obj = null;
            // Connection success
            var obj_connected = false;
            // Gecko, Webkit and Opera
            if ( window.XMLHttpRequest ) {
                obj_connected = true;
                xml_http_obj = new XMLHttpRequest();
            }
            // Microsoft Internet Explorer
            else if ( window.ActiveXObject ) {
                try {
                    obj_connected = true; 
                    xml_http_obj = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        obj_connected = true;
                        xml_http_obj = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        obj_connected = false;
                    }
                }
            }
            // If object is connected, than send a request to server
            if ( obj_connected == true ) {
                // Run the query
                xml_http_obj.open( method, serverSource + "?" + params, status );
                //  - wait, till a value turns back
                xml_http_obj.send(null);
                //  - Get the response
                $_id("wepiServReqTag").innerHTML = xml_http_obj.responseText;
            // If the object could not connected, than the browser does
            // not have a support for Ajax or this feature is deactivated
            } else {
                success = false;
                $_id("wepiServReqTag").innerHTML = "ERROR: Your browser does not support Ajax or the Ajax support is disabled!";
            }
            // Return success-state
            return success;
        }
        function wepiServerReqEx( method, serverSource, params, status ) {
            // Hidden-Tag, which gets the responce
            //$_id("wepiServReqTag").innerHTML = "";
            // Success
            var success = false;
            // Connection object
            var xml_http_obj = null;
            // Connection success
            var obj_connected = false; var outpval;
            // Gecko, Webkit and Opera
            if ( window.XMLHttpRequest ) {
                obj_connected = true;
                xml_http_obj = new XMLHttpRequest();
            }
            // Microsoft Internet Explorer
            else if ( window.ActiveXObject ) {
                try {
                    obj_connected = true; 
                    xml_http_obj = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        obj_connected = true;
                        xml_http_obj = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        obj_connected = false;
                    }
                }
            }
            // If object is connected, than send a request to server
            if ( obj_connected == true ) {
				var pt = "";
				// *** //
				// SESSION IDENTIFIER WILL BE GIVEN FIRST, IF ITS AVAILABLE //
				if ( params[0] != "" ) { pt += params[0] + "&"; }
				// *** //
				pt += "parcount=" + params.length;
				// *** //
                for ( var i = 0; i < params.length; i++ ) {
                    pt += "&param" + i + "=" + params[i];
                }
				// *** //
				var tpt = pt; pt = "";
				// *** //
				for( var i = 0; i < tpt.length; i++ ) {
					if ( ( tpt.charCodeAt(i) == 10 ) || ( tpt.charCodeAt(i) == 13 ) ) {
						// Do nothing
					} else {
						pt += tpt.charAt(i);
					}
				}
                // Run the query
                xml_http_obj.open( method, serverSource + "?" + pt, status );
                //  - wait, till a value turns back
                xml_http_obj.send(null);
                //  - Get the response
                //$_id("wepiServReqTag").innerHTML = xml_http_obj.responseText;
                //outpval = xml_http_obj.responseText;
                //return outpval;
                return xml_http_obj.responseText;
            // If the object could not connected, than the browser does
            // not have a support for Ajax or this feature is deactivated
            } else {
                success = false;
                //$_id("wepiServReqTag").innerHTML = 
                return "???";
            }
        }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        Browser - Identification
            To handle the mouse
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
      var wepiCBrowser = document.all?true:false;
      if ( !wepiCBrowser ) { document.captureEvents(Event.MOUSEMOVE); }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        Page - Centerize
            Description:
            UpdateSize()          Update the current width & height of the document
            element_to_center_h   set up element position to horizontal center
            element_to_center_v   set up element position to vertical center
            wepiSetCenterXY(id)   X , Y
            wepiSetCenterX(id)    X
            wepiSetCenterY(id)    Y
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      Public variables that deliver the current document's width
       *      and height. Before use this variables, you must call
       *      UpdateSize() to initialize or refresh the current size
       *      of the document.
       *
       --------------------------------------------------------------------- */
      var wepiPageW = 0; var wepiPageH = 0;
    /* ---------------------------------------------------------------------
       *
       *      Base function to calculate the current document width   
       *
       --------------------------------------------------------------------- */
      function getWindowWidth(win) {   
          if (win == undefined) { win = window; }   
          if (win.innerWidth) { return win.innerWidth; }   
          else {   
              if (win.document.documentElement &&   
                  win.document.documentElement.clientWidth) {   
                  return win.document.documentElement.clientWidth;   
              }   
              return win.document.body.offsetWidth;   
          }   
      }   
    /* ---------------------------------------------------------------------
       *
       *      Base function to calculate the current document height   
       *
       --------------------------------------------------------------------- */
      function getWindowHeight(win) {   
          if (win == undefined) { win = window; }   
          if (win.innerHeight) { return win.innerHeight; }   
          else {   
              if (win.document.documentElement   
                  && win.document.documentElement.clientHeight) {   
                  return win.document.documentElement.clientHeight;   
              }   
              return win.document.body.offsetHeight;   
          }   
      }  
    /* ---------------------------------------------------------------------
       *
       *      Save the current document width and height to the public
       *      variables wepiPageW and wepiPageH          
       *
       --------------------------------------------------------------------- */
      function UpdateSize() {
      
          wepiPageW = getWindowWidth();
          wepiPageH = getWindowHeight();
      }
    /* ---------------------------------------------------------------------
       *
       *      Will move an element by it's id to the center of the document
       *      volume in the way that the centerizing will effect only in
       *      horizontal mode.       
       *
       --------------------------------------------------------------------- */
      function element_to_center_h( id ) {
             $_css(id).left =
             parseInt( ( parseInt( wepiPageW ) - parseInt( $_css(id).width ) ) / 2 ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      Will move an element by it's id to the center of the document
       *      volume in the way that the centerizing will effect only in
       *      vertical mode.                 
       *
       --------------------------------------------------------------------- */
      function element_to_center_v( id ) {
             $_css(id).top =
             parseInt( ( parseInt( wepiPageH ) - parseInt( $_css(id).height ) ) / 2 ) + "px";
        }
    /* ---------------------------------------------------------------------
       *
       *      Will move an element by it's id in the center of the document
       *      volume in vertical and horizontal mode.          
       *
       --------------------------------------------------------------------- */
      function wepiSetCenterXY ( id ) {
          UpdateSize();
          element_to_center_v(id);
          element_to_center_h(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      Does the same like element_to_center_h, but will refresh
       *      the document size before effecting.          
       *
       --------------------------------------------------------------------- */
      function wepiSetCenterX ( id ) {
          UpdateSize();
          $_css(id).top = "0px";
          element_to_center_h(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      Does the same like element_to_center_v, but will refresh
       *      the document size before effecting.          
       *
       --------------------------------------------------------------------- */
      function wepiSetCenterY ( id ) {
          UpdateSize();
          $_css(id).left = "0px";
          element_to_center_v(id);
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
   
        wepiBrowser
        
            Methods
            ------------------------------------------
            
            Identify                identifies your browser
            getIE                   delivers the version of Internet Explorer
            supportedIE             true if >= 7, false if lower 7
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
        var wepiBrowser = function ( ) {
            // Identify is only to get, not to set
            this.identify = function ( ) {
              	if      ( navigator.userAgent.indexOf("Opera") != -1            ) { return "opera"; }
                else if ( navigator.userAgent.indexOf("Netscape") != -1         ) { return "netscape"; }
              	else if ( navigator.appName.indexOf("Internet Explorer" ) != -1 ) { return "ie"; }
              	else if ( navigator.userAgent.indexOf("Firefox") != -1          ) { return "firefox"; }
              	else if ( navigator.userAgent.indexOf("Iron") != -1             ) { return "iron"; }
              	else if ( navigator.userAgent.indexOf("Chrome") != -1           ) { return "chrome"; }
              	else if ( navigator.userAgent.indexOf("Safari") != -1           ) { return "safari"; }
              	else                                                              { return ""; }
            }
    
            // Identify, which version of the Internet Explorer is using
            this.getIE = function ( ) {
                    var MicrosoftIE = {
                      Version: function() {
                        var version = 999; // we assume a sane browser
                        if (navigator.appVersion.indexOf("MSIE") != -1)
                          // bah, IE again, lets downgrade version number
                          version = parseFloat(navigator.appVersion.split("MSIE")[1]);
                        return version;
                      }
                    }
                    return MicrosoftIE.Version();
            }
    
            // Is the version of Internet Explorer which is running, supported?
            this.supportedIE = function ( ) {
                    if ( this.getIE >= 7 ) { return true; } else { return false; }
            }
        };
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
        Text Width & Height - Object
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
        var wepiText = function () {
            this.Padding = 0;
            this.Font    = "Arial";
            this.Size    = 12;
            this.Bold    = true;
            this.LSpace  = 0;
            this.WSpace  = 0;
            this.String  = "";
            this.Ident   = "";
            this.Width = function () {
                var o = document.getElementById(this.Ident);
                if ( o ) { return parseInt(o.clientWidth + 1); }
            }
            this.Height = function () {
                var o = document.getElementById(this.Ident);
                if ( o ) { return parseInt(o.clientHeight + 1); }
            }
        };
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      Basic functions
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      addMethod - By John Resig (MIT Licensed)
       *      
       *      Allows to create objects with overloaded methods.             
       *
       --------------------------------------------------------------------- */
      function addMethod(object, name, fn){
          var old = object[ name ];
          object[ name ] = function() {
              if ( fn.length == arguments.length ) { return fn.apply( this, arguments ); }
              else if ( typeof old == 'function' ) { return old.apply( this, arguments ); }
          };
      }
    /* ---------------------------------------------------------------------
       *
       *      Is stream numeric only?  
       *
       --------------------------------------------------------------------- */
    function isStrNumOnly( v ) {
        var i = 0; var j = 0;
        var b = true;
        var l = "0123456789.";
        for ( i = 0; i < v.length; i++ ) {
            for ( j = 0; j < l.length; j++ ) {
                if ( v[i] != l[j] ) { b = false; } else
                if ( v[i] == l[j] ) { b = true; break; }
            }
            if ( b == false ) { break; }
        }
        return b;
    }
    /* ---------------------------------------------------------------------
       *
       *      Print any kind of string directly to the document.
       *      This function is a shortcut for the document.write() function.   
       *
       --------------------------------------------------------------------- */
      function print( t ) {
        document.write( t );
      }
    /* ---------------------------------------------------------------------
       *
       *      Returns the last stream of the string from the last 
       *      specific char, which is pointed as the separator to
       *      cut the seeked stream part      
       *
       --------------------------------------------------------------------- */
      function strLast( s, c ) {
          var i = 0; var t = "";
          for ( i = 0; i < s.length; i++ ) {
              if ( s.charAt(i) == c.charAt(0) ) {
                  t = "";
              } else { t = t + s.charAt(i); }
          }
          return t;
      }
    /* ---------------------------------------------------------------------
       *
       *      Returns the first stream of the string till a specific char
       *
       --------------------------------------------------------------------- */
      function strFirst( s, c ) {
          var i = 0; var t = "";
          for ( i = 0; i < s.length; i++ ) {
              if ( s.charAt(i) == c.charAt(0) ) {
                  break;
              } else { t = t + s.charAt(i); }
          }
          return t;
      }
    /* ---------------------------------------------------------------------
       *
       *      Transform the large letters to small letters
       *
       --------------------------------------------------------------------- */
      function lower( t ) {
          var l = "ABCDEFGHIJKLMNOPQRSTUVWXYZ�����";
          var s = "abcdefghijklmnopqrstuvwxyz�����";
          var n = "";
          var i = 0;
          var j = 0;
          var c = "";
          var b = false;
          for( i = 0; i < t.length; i++ ) {
              b = false;
              for( j = 0; j < l.length; j++ ) {
                  if ( t.charAt(i) == l.charAt(j) ) { c = s.charAt(j); b = true; break; }
              }
              if ( b == true ) { n = n + c; } else { n = n + t.charAt(i); }
          }
          return n;
      }
    /* ---------------------------------------------------------------------
       *
       *      Transform small letters to large letters
       *
       --------------------------------------------------------------------- */
      function upper( t ) {
          var l = "ABCDEFGHIJKLMNOPQRSTUVWXYZ�����";
          var s = "abcdefghijklmnopqrstuvwxyz�����";
          var n = "";
          var i = 0;
          var j = 0;
          var c = "";
          var b = false;
          for( i = 0; i < t.length; i++ ) {
              b = false;
              for( j = 0; j < l.length; j++ ) {
                  if ( t.charAt(i) == s.charAt(j) ) { c = l.charAt(j); b = true; break; }
              }
              if ( b == true ) { n = n + c; } else { n = n + t.charAt(i); }
          }
          return n;
      }
    /* ---------------------------------------------------------------------
       *
       *      Include a javascript, stylesheet or php file:
       *      
       *      if the file extenstion is *.js, it will include by the
       *      script-tag.
       *      
       *      if the file extension is *.css, it will include by the
       *      link-tag.
       *      
       *      if the file extension is *.php, it will include by the
       *      php-tag.                     
       *
       --------------------------------------------------------------------- */
      function include ( t ) {
          var e = lower( strLast( t, '.' ) );
          var i = 0;
          if ( e == "js" ) {
              var scripts = document.getElementsByTagName('script');
              if ( scripts ) {
                  for( i = 0; i < scripts.length; i++ ) {
                      if ( scripts[i].src == t ) { return; }
                  }
              }
              //print( '<script type = "text/javascript" src = "' + t + '"></script>' );
              var script = document.createElement('script');
              script.src = t;
              script.type = 'text/javascript';
              (document.getElementsByTagName('HEAD')[0] || document.body).appendChild(script);
          } else
          if ( e == "php" ) {
              print( '<?php include( "' + t + '" ); ?>' );
          } else
          if ( e == "css" ) {
              print( '<link rel = "stylesheet" type = "text/css" href = "' + t + '">' );
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      Include files from an array
       *
       --------------------------------------------------------------------- */
      function bind ( a ) {
          var i = 0;
          for ( i = 0; i < a.length; i++ ) {
              include( a[i] ); 
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      Includes a stylesheet with the target device delaration
       *
       --------------------------------------------------------------------- */
      var css_screen = 0;
      var css_printer = 1;
      var css_aural = 2;
      function incStyle( f, d ) {
          switch ( d ) {
              case 0: print( '<link rel = "stylesheet" type = "text/css" media = "screen" href = "' + f + '">' ); break;
              case 1: print( '<link rel = "stylesheet" type = "text/css" media = "print, embossed" href = "' + f + '">' ); break;
              case 2: print( '<link rel = "stylesheet" type = "text/css" media = "aural" href = "' + f + '">' ); break;
          } 
      }
    /* ---------------------------------------------------------------------
       *
       *      TAG Creator   
       *
       --------------------------------------------------------------------- */
      function wepiTAGAttrib() {
          var arr;
          var a;
          var b;
          var nn = 0;
          var i = 0; var j = 0; var s = ""; var f = ""; var t = "";
          switch( arguments.length ) {
              case 0: nn = 1; break;
              case 1: arr = arguments[0]; nn = 2; break;
              case 2: a = arguments[0]; b = arguments[1]; nn = 2; break;
          }
          if ( nn == 0 ) {
              for ( i = 0; i < arr.length; i++ ) {
                  f = arr[i]; t = "";
                  for ( j = 0; j < f.length; j++ ) {
                      if ( f.charAt(j) == '=' ) {
                          t += '="';
                      } else {
                          t += f.charAt(j);
                      }
                  }
                  s += ' "' + t + ' ';
              }
              return s;
          } else if ( nn == 2 ) {
              return ' ' + a + ' = "' + b + '" ';
          }
      }
      function wepiCSSAttrib( arr ) {
          var i = 0; var s = "";
          for ( i = 0; i < arr.length; i++ ) {
              s += arr[i] + ";";
          }
          return s;
      }
      function wepiTAG() {
          var x   =  0;
          var y   =  0;
          var w   =  0;
          var h   =  0;
          var tag = "";
          var id  = "";
          var cls = "";
          var pos = "";
          var enc = true;
          var s   = "";
          var i   =  0;
          for ( i = 0; i < arguments.length; i++ ) {
              switch( i ) {
                  case 0: x   = arguments[0]; break;
                  case 1: y   = arguments[1]; break;
                  case 2: w   = arguments[2]; break;
                  case 3: h   = arguments[3]; break;
                  case 4: tag = arguments[4]; break;
                  case 5: id  = arguments[5]; break;
                  case 6: cls = arguments[6]; break;
                  case 7: pos = arguments[7]; break;
                  case 8: enc = arguments[8]; break;
              };
          }
          if ( tag == "" ) { tag == "div"; }
          s = '<' + tag;
          if ( id  != "" ) { s += ' id = "' +  id + '" '; }
          if ( cls != "" ) { s += ' class = "' + cls + '" '; }
          s += ' style = "position:';
          if ( pos == "" ) { s += "absolute;"; }
          s += "left:" + x + "px;top:" + y + "px;width:" + w + "px;height:" + h + "px;";
          s += '"';
          if ( enc == true ) {
              s += '></' + tag + '>';
          } else {
              s += ' />';
          }
          return s;
      }
      function wepiDOM () {
          switch( arguments.length ) {
              case 5:
                  print(
                      wepiTAG(
                            arguments[0], arguments[1], arguments[2],
                            arguments[3], arguments[4]
                      )
                  );
                  break;
              case 6:
                  print(
                      wepiTAG(
                            arguments[0], arguments[1], arguments[2],
                            arguments[3], arguments[4], arguments[5]
                      )
                  );
                  break;
              case 7:
                  print(
                      wepiTAG(
                            arguments[0], arguments[1], arguments[2],
                            arguments[3], arguments[4], arguments[5],
                            arguments[6]
                      )
                  );
                  break;
              case 8:
                  print(
                      wepiTAG(
                            arguments[0], arguments[1], arguments[2],
                            arguments[3], arguments[4], arguments[5],
                            arguments[6], arguments[7]
                      )
                  );
                  break;
              case 9:
                  print(
                      wepiTAG(
                            arguments[0], arguments[1], arguments[2],
                            arguments[3], arguments[4], arguments[5],
                            arguments[6], arguments[7], arguments[8]
                      )
                  );
                  break;
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      Overwrites the value of the target element with the value
       *      of the source element.   
       *
       --------------------------------------------------------------------- */
      function catch_value( tid, sid ) {
        document.getElementById(tid).innerHTML = $_id(sid).innerHTML;
      }
    /* ---------------------------------------------------------------------
       *
       *      Returns the same text with removing start and close spaces
       *
       --------------------------------------------------------------------- */
      function trim ( t ) {
        return t.replace (/^\s+/, '').replace (/\s+$/, '');
      }
    /* ---------------------------------------------------------------------
       *
       *      Returns the Container's position and volume-size   
       *
       --------------------------------------------------------------------- */
      function con_rect() {
          var x = "";
          var y = "";
          var w = "";
          var h = "";
          var i = 0;
          for ( i = 0; i < arguments.length; i++ ) {
              switch( i ) {
                  case 0: x = "left:" + x + "px;"; break;
                  case 1: y = "top:" + y + "px;"; break;
                  case 2: w = "width:" + w + "px;"; break;
                  case 3: h = "height:" + h + "px;"; break;
              }
          }
          return x + y + w + h;
      }
    /* ---------------------------------------------------------------------
       *
       *      Returns the Container-Volume-Size
       *
       --------------------------------------------------------------------- */
      function con_size( w, h ) {
          return "width:" + w + "px;height:" + h + "px;";
      }
    /* ---------------------------------------------------------------------
       *
       *      Returns the Container's alternative position and volume-size
       *
       --------------------------------------------------------------------- */
      function con_rect_ex( rx, ry, w, h ) {
          return "right:" + rx + "px;bottom:" + py + "px;width:" + w + "px;height:" + h + "px;";
      }
    /* ---------------------------------------------------------------------
       *
       *      Char Volume Setting - Object
       *
       --------------------------------------------------------------------- */
      var wepiCharAttr = function () {
          this.w = 0;
          this.h = 0;
      };
    /* ---------------------------------------------------------------------
       *
       *      Char Volume Setting
       *
       --------------------------------------------------------------------- */
      var charAttr = new wepiCharAttr();
          charAttr.w =  8;
          charAttr.h =  8;
    /* ---------------------------------------------------------------------
       *
       *      Function to find the text-Width
       *
       --------------------------------------------------------------------- */
      var textSizeParam = new wepiText();
      function textWidth( text ) {
          // --- --- --- --- --- --- --- --- --- --- --- --- //
          var m = 0;
          // --- --- --- --- --- --- --- --- --- --- --- --- //
              m = text.length * charAttr.w;
          // --- --- --- --- --- --- --- --- --- --- --- --- //
          return parseInt(m);/*
          textSizeParam.Ident = "txSzPar";
          return textSizeParam.Width();*/ 
      }
    /* ---------------------------------------------------------------------
       *
       *      Function to find the text-Height
       *
       --------------------------------------------------------------------- */
      function textHeight( text ) {
          return parseInt(charAttr.h);
      }
    /* ---------------------------------------------------------------------
       *
       *      Get numeric letters
       *
       --------------------------------------------------------------------- */
      function GetNum( t ) {
          var i = 0; var s = "";
          for ( i = 0; i < t.length; i++ ) {
              switch( t.charAt(i) ) {
                  case '0': s = s + t.charAt(i); break;
                  case '1': s = s + t.charAt(i); break;
                  case '2': s = s + t.charAt(i); break;
                  case '3': s = s + t.charAt(i); break;
                  case '4': s = s + t.charAt(i); break;
                  case '5': s = s + t.charAt(i); break;
                  case '6': s = s + t.charAt(i); break;
                  case '7': s = s + t.charAt(i); break;
                  case '8': s = s + t.charAt(i); break;
                  case '9': s = s + t.charAt(i); break;
              }
          }
          return parseInt(s);
      }
    /* ---------------------------------------------------------------------
       *
       *      Read partial string
       *
       --------------------------------------------------------------------- */
      function partialStr( s, c, x ) {
          var i = 0; var n = 0; var t = "";
          for ( i = 0; i < s.length; i++ ) {
              if ( s.charAt(i) == c ) {
                  if ( n == x ) { break; } else { n++; t = ""; }
              } else {
                  t += s.charAt(i);
              }
          }
          if ( n <= x ) { return t; } else { return ""; }
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      Get *
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      GetX will find the x-position of an element by it's id
       *      and will return the position-value as number.
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolutly.
       *
       --------------------------------------------------------------------- */
      function GetX(id) {
               return parseInt( $_css(id).left );
      }
    /* ---------------------------------------------------------------------
       *
       *      This function is a hybride of GetX   
       *
       --------------------------------------------------------------------- */
      function GetX1(id) {
               return GetX(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetY will find the y-position of an element by it's id
       *      and will return the position-value as number.
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolutly.                               
       *
       --------------------------------------------------------------------- */
      function GetY(id) {
               return parseInt( $_css(id).top );
      }
    /* ---------------------------------------------------------------------
       *
       *      This function is a hybride of GetY   
       *
       --------------------------------------------------------------------- */
      function GetY1(id) {
               return GetY(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetW will return the horizontal size of an element as number
       *      by it's id.
       *      
       *      Note: This function can only take effect, if the element
       *      is sized with the "width" attribute by stylesheet.                               
       *
       --------------------------------------------------------------------- */
      function GetW(id) {
               return parseInt( $_css(id).width );
      }
    /* ---------------------------------------------------------------------
       *
       *      GetH will return the vertical size of an element as number
       *      by it's id.
       *      
       *      Note: This function can only take effect, if the element
       *      is sized with the "height" attribute by stylesheet.                               
       *
       --------------------------------------------------------------------- */
      function GetH(id) {
               return parseInt( $_css(id).height );
      }
    /* ---------------------------------------------------------------------
       *
       *      GetLH will return the line-height of an element as number
       *      by it's id.
       *      
       *      Note: This function can only take effect, if the element
       *      has a line-height set up. It's a stylesheet attribute.                               
       *
       --------------------------------------------------------------------- */
      function GetLH(id) {
               return parseInt( $_css(id).lineHeight );
      }
    /* ---------------------------------------------------------------------
       *
       *      GetX2 will find the right-side position of an element by it's
       *      id and will return it's position-value as number.
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute and the "width" attribute is also set.                     
       *
       --------------------------------------------------------------------- */
      function GetX2(id) {
               return GetX(id) + GetW(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetY2 will find the bottom-side position of an element by it's
       *      id and will return it's position-value as number.
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute and the "height" attribute is also set.                               
       *
       --------------------------------------------------------------------- */
      function GetY2(id) {
               return GetY(id) + GetH(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetY2b will find the bottom-side position of an element by it's
       *      id, while using line-height attribute instead of height-attribute,
       *      and will return it's position-value as number.
       *      
       *      Note: This function can only take effect, if the element is
       *      positioned absolute and the "line-height" attribute is also set.                                      
       *
       --------------------------------------------------------------------- */
      function GetY2b(id) {
               return GetY(id) + GetLH(id);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetV(alue) will return the value of the element   
       *
       --------------------------------------------------------------------- */
      function GetV( id ) {
                var tt = $_id(id).nodeName;
                if ( ( tt == "TEXTAREA" ) || ( tt == "INPUT" ) ) {
                    return $_id(id).value;
                
                } else {
                
                    return $_id(id).innerHTML;
                
                }
      }
    /* ---------------------------------------------------------------------
       *
       *      GetEx(tended) will return the value of the element
       *      while it will get the inner element closed by the statement
       *      > ... < and will remove all other letters outside of the
       *      statement.                        
       *
       --------------------------------------------------------------------- */
      var GetExJumpPoint = 0;
      function GetEx( id ) {
                var i = 0;
                var s = "";
                var t = $_id(id).innerHTML;
                var n = 0;
                for ( i = 0; i < t.length; i++ ) {
                    if ( t.charAt(i) == '>' ) { s = ""; GetExJumpPoint = i + 1; }
                    else if ( t.charAt(i) == '<' ) {
                        if ( trim(s) != "" ) {
                            if ( n < 3 ) { n++; } else { break; }
                        }
                    } else { s += t.charAt(i); }
                }
                if ( s == "" ) {
                  n = 0;
                  for ( i = 0; i < t.length; i++ ) {
                      if ( t.charAt(i) == '>' ) { s = ""; GetExJumpPoint = i + 1; }
                      else if ( t.charAt(i) == '<' ) {
                          if ( trim(s) != "" ) {
                              if ( n < 2 ) { n++; } else { break; }
                          }
                      } else { s += t.charAt(i); }
                  }               
                }
                if ( s == "" ) {
                  n = 0;
                  for ( i = 0; i < t.length; i++ ) {
                      if ( t.charAt(i) == '>' ) { s = ""; GetExJumpPoint = i + 1; }
                      else if ( t.charAt(i) == '<' ) {
                          if ( trim(s) != "" ) {
                              if ( n < 1 ) { n++; } else { break; }
                          }
                      } else { s += t.charAt(i); }
                  }               
                }
                if ( s == "" ) {
                  n = 0;
                  for ( i = 0; i < t.length; i++ ) {
                      if ( t.charAt(i) == '>' ) { s = ""; GetExJumpPoint = i + 1; }
                      else if ( t.charAt(i) == '<' ) {
                          if ( trim(s) != "" ) { break; }
                      } else { s += t.charAt(i); }
                  }               
                }
                return trim(s);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetEx(tended) will return the value of the element
       *      while it will get the inner element closed by the statement
       *      > ... < and will remove all other letters outside of the
       *      statement.
       *      
       *      Same like GetEx, but it allows deep by manual control.                                             
       *
       --------------------------------------------------------------------- */
      function GetEx2( id, p ) {
                var i = 0;
                var s = "";
                var t = $_id(id).innerHTML;
                var n = 0;
                for ( i = 0; i < t.length; i++ ) {
                    if ( t.charAt(i) == '>' ) { s = ""; GetExJumpPoint = i + 1; }
                    else if ( t.charAt(i) == '<' ) {
                        if ( trim(s) != "" ) {
                            if ( n < p ) { n++; } else { break; }
                        }
                    } else { s += t.charAt(i); }
                }
                return trim(s);
      }
    /* ---------------------------------------------------------------------
       *
       *      GetVisible will return a TRUE-value, if the element is
       *      visible and a FALSE-value, if the element is unvisible.
       *      
       *      Note: This function will return TRUE or FALSE, if the
       *      "visibility" - attribute of the element is set by 
       *      stylesheet. If this attribute is not set, the function
       *      will return the numeric value -1.
       *      
       *      < The function needs the id of the element as parameter >                                                           
       *
       --------------------------------------------------------------------- */
      function GetVisible( id ) {
          if ( $_css(id).visibility == "visible" ) { return true;  } else
          if ( $_css(id).visibility == "hidden" )  { return false; } else
		                                           { return -1;    } // -1 = undefined
      }
    /* ---------------------------------------------------------------------
       *
       *      GetDisp will return a TRUE-value, if the element is
       *      visible and a FALSE-value, if the element is unvisible.
       *      
       *      Note: This function will return TRUE or FALSE, if the
       *      "display" - attribute of the element is set by
       *      stylesheet. If this attribute is not set, the function
       *      will return the numeric value -1.
       *      
       *      < The function needs the id of the element as parameter >                                                        
       *
       --------------------------------------------------------------------- */
      function GetDisp( id ) {
          if ( $_css(id).display == "block" ) { return true; } else
          if ( $_css(id).display == "none" )  { return false; } else
                                                                      { return -1; } // -1 = undefined
      }
    /* ---------------------------------------------------------------------
       *
       *      GetDisplay will return the real value of the "display"-
       *      attribute of an element by using it's id.
       *
       --------------------------------------------------------------------- */
      function GetDisplay( id ) { $_css(id).display; } // Delivers the real attribute
    /* ---------------------------------------------------------------------
       *
       *      GetBkg will return the value of the "background" - attribute
       *      of the element by using it's id.
       *
       --------------------------------------------------------------------- */
      function GetBkg( id ) { return $_css(id).background; }
    /* ---------------------------------------------------------------------
       *
       *      GetBkgImage will return the background-image of an element
       *      by using it's id.
       *      
       *      Note: This function can only take effect, if the background-
       *      image of the source element is set by stylesheet.                            
       *
       --------------------------------------------------------------------- */
      function GetBkgImage( id ) { return $_css(id).backgroundImage; }
    /* ---------------------------------------------------------------------
       *
       *      GetBkgColor will return the background-color of the element
       *      by using it's id.
       *      
       *      Note: This function can only take effect, if the background-
       *      color of the source element is set by stylesheet.                             
       *
       --------------------------------------------------------------------- */
      function GetBkgColor( id ) { return $_css(id).backgroundColor; }
    /* ---------------------------------------------------------------------
       *
       *      These are direction-mode parameters for some following
       *      functions.
       *
       --------------------------------------------------------------------- */
      var ModeA   = 0;
      var ModeT   = 1;
      var ModeL   = 2;
      var ModeR   = 3;
      var ModeB   = 4;
    /* ---------------------------------------------------------------------
       *
       *      GetBorder will return the border-style of the element by using
       *      it's id.
       *      
       *      As "v"-parameter you need to give one of the parameter options
       *      above.
       *      
       *      Note: This function can only take effect, if the border-style
       *      for all or one specific border is set by using stylesheet.                                             
       *
       --------------------------------------------------------------------- */
      function GetBorder( id, v ) {
          switch ( v ) {
              case 0: return $_css(id).border;       break;
              case 1: return $_css(id).borderTop;    break;
              case 2: return $_css(id).borderLeft;   break;
              case 3: return $_css(id).borderRight;  break;
              case 4: return $_css(id).borderBottom; break;
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      GetPadding will return the padding-size of the element by using
       *      it's id.
       *      
       *      As "v"-parameter you need to give one of the parameter options
       *      above.
       *      
       *      Note: This function can only take effect, if the padding-size
       *      for all or one specific border is set by using stylesheet.                                             
       *
       --------------------------------------------------------------------- */
      function GetPadding( id, v ) {
          switch ( v ) {
              case 0: return $_css(id).padding;       break;
              case 1: return $_css(id).paddingTop;    break;
              case 2: return $_css(id).paddingLeft;   break;
              case 3: return $_css(id).paddingRight;  break;
              case 4: return $_css(id).paddingBottom; break;
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      GetMargin will return the margin-size of the element by using
       *      it's id.
       *      
       *      As "v"-parameter you need to give one of the parameter options
       *      above.
       *      
       *      Note: This function can only take effect, if the margin-size
       *      for all or one specific border is set by using stylesheet.                                             
       *
       --------------------------------------------------------------------- */
      function GetMargin( id, v ) {
          switch ( v ) {
              case 0: return $_css(id).margin;       break;
              case 1: return $_css(id).marginTop;    break;
              case 2: return $_css(id).marginLeft;   break;
              case 3: return $_css(id).marginRight;  break;
              case 4: return $_css(id).marginBottom; break;
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      GetFonts will return all fonts that are listes in the 
       *      "font-family" attribute of the element.
       *      
       *      To identify the element, the function needs it's id.                                                                  
       *
       --------------------------------------------------------------------- */
      function GetFonts( id ) { return $_css(id).fontFamily; }
    /* ---------------------------------------------------------------------
       *
       *      GetSize will return the value of the "font-size" attribute
       *      of the element.
       *      
       *      To identify the element, the function needs it's id.                                                                  
       *
       --------------------------------------------------------------------- */
      function GetSize( id ) { return $_css(id).fontSize; }
    /* ---------------------------------------------------------------------
       *
       *      GetImage is specially designed for the HTML-IMG-TAG element.
       *      It will return it's source-value.                                                    
       *
       --------------------------------------------------------------------- */
      function GetImage( id ) {
          $_id(id).src;
      }
    /* ---------------------------------------------------------------------
       *
       *      GetZi stands for the z-index.                                                    
       *
       --------------------------------------------------------------------- */
      function GetZi( id ) {
          $_css(id).zIndex;
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      Set(up) *
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      SetX will move the element to another position on the 
       *      horizontal line by using it's id.       
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute.
       *
       --------------------------------------------------------------------- */
      function SetX(id, v) {
               $_css(id).left = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetX1 is a hybride function of SetX                               
       *
       --------------------------------------------------------------------- */
      function SetX1(id, v) {
               $_css(id).left = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetY will move the element to another position on the
       *      vertical line by using it's id.        
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute.
       *
       --------------------------------------------------------------------- */
      function SetY(id, v) {
               $_css(id).top = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetY1 is a hybride function of SetY
       *
       --------------------------------------------------------------------- */
      function SetY1(id, v) {
               $_css(id).top = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetW will resize the element on the horizontal line by
       *      using it's id.        
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the stylesheet attribute "width".
       *
       --------------------------------------------------------------------- */
      function SetW(id, v) {
               $_css(id).width = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetH will resize the element on the vertical line by
       *      using it's id.       
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the stylesheet attribute "height".
       *
       --------------------------------------------------------------------- */
      function SetH(id, v) {
               $_css(id).height = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetLH will resize the line-height-attribute of the element
       *      by using it's id.       
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the stylesheet attribute "line-height".
       *
       --------------------------------------------------------------------- */
      function SetLH(id, v) {
               $_css(id).lineHeight = parseInt( v ) + "px";
      }
    /* ---------------------------------------------------------------------
       *
       *      SetV(alue) will change the value of the element
       *
       --------------------------------------------------------------------- */
      function SetV( id, v ) {
                var tt = $_id(id).nodeName;
                if ( ( tt == "TEXTAREA" ) || ( tt == "INPUT" ) ) {
                    $_id(id).value = v;
                } else {
                
                    $_id(id).innerHTML = v;
                
                }
      }
    /* ---------------------------------------------------------------------
       *
       *      SetEx(tended) will modify the value of the element
       *      while it will get the inner element closed by the statement
       *      > ... < and will remove all other letters outside of the
       *      statement.                        
       *
       --------------------------------------------------------------------- */
      function SetEx( id, v ) {
                var t = GetEx(id);
                var s = $_id(id).innerHTML;
                var i = 0; var a = 0; var b = 0;
                var h = "";
                t = t.replace( /&nbsp;/g, "" );
                for ( i = GetExJumpPoint; i < s.length - t.length; i++ ) {
                  if ( strMid( s, i, t.length - 1 ) == t ) {
                      a = i;
                      b = a + t.length;
                      break;
                  }
                }
                t = "";
                for ( i = 0; i < a; i++ ) { t += s.charAt(i); }
                
                t += v;
                
                for ( i = b; i < s.length; i++ ) { t += s.charAt(i); }
                $_id(id).innerHTML = t;
      }
    /* ---------------------------------------------------------------------
       *
       *      SetEx(tended)2 will modify the value of the element
       *      while it will get the inner element closed by the statement
       *      > ... < and will remove all other letters outside of the
       *      statement.
       *      
       *      This is the equivalent for GetEx2              
       *
       --------------------------------------------------------------------- */
      function SetEx2( id, v, p ) {
                var t = GetEx(id, p);
                var s = $_id(id).innerHTML;
                var i = 0; var a = 0; var b = 0;
                var h = "";
                t = t.replace( /&nbsp;/g, "" );
                for ( i = GetExJumpPoint; i < s.length - t.length; i++ ) {
                  if ( strMid( s, i, t.length - 1 ) == t ) {
                      a = i;
                      b = a + t.length;
                      break;
                  }
                }
                t = "";
                for ( i = 0; i < a; i++ ) { t += s.charAt(i); }
                
                t += v;
                
                for ( i = b; i < s.length; i++ ) { t += s.charAt(i); }
                $_id(id).innerHTML = t;
      }
    /* ---------------------------------------------------------------------
       *
       *      SetVisible will hide or show the element on the document
       *      with the "visibility"-attribute of the stylesheet by using
       *      it's id.       
       *      
       *      Note: The element needs to set with the "visibility"-
       *      attribute before in "hidden" or "visible" state.
       *
       --------------------------------------------------------------------- */
      function SetVisible( id, v ) {
            var a = "";
      
            if ( v == false ) { a = "hidden"; } else
            if ( v == true  ) { a = "visible"; }
      
            $_css(id).visibility = a;
      }
    /* ---------------------------------------------------------------------
       *
       *      SetDisp will hide or show the element on the document with
       *      the "display"-attribute of the stylesheet by using it's id.        
       *      
       *      Note: The element needs to set with the "display"-attribute
       *      before in "block" or "none" state.       
       *
       --------------------------------------------------------------------- */
      function SetDisp( id, v ) {
      
            var a = "";
      
            if ( v == false ) { a = "none"; } else
            if ( v == true  ) { a = "block"; }
      
            $_css(id).display = a;
      }
    /* ---------------------------------------------------------------------
       *
       *      SetImage is specially designed for the HTML-IMG-TAG can
       *      will change it's source.                                      
       *
       --------------------------------------------------------------------- */
      function SetImage( id, nImage ) {
          $_id(id).src = nImage;
      }
    /* ---------------------------------------------------------------------
       *
       *      GetZi stands for the z-index.                                                    
       *
       --------------------------------------------------------------------- */
      function SetZi( id, v ) {
          $_css(id).zIndex = v;
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      App(end) *
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      AppV(alue) will append further value to the current value
       *      of the element.                                     
       *
       --------------------------------------------------------------------- */
      function AppV( id, v ) {
                var tt = $_id(id).nodeName;
                if ( ( tt == "TEXTAREA" ) || ( tt == "INPUT" ) ) {
                    $_id(id).value += v;
                
                } else {
                
                    $_id(id).innerHTML += v;
                
                }
      }
    /* ---------------------------------------------------------------------
       *
       *      AppEx(tended) will modify the value of the element
       *      while it will get the inner element closed by the statement
       *      > ... < and will remove all other letters outside of the
       *      statement.                        
       *
       --------------------------------------------------------------------- */
      function AppEx( id, v ) {
                var n = GetEx(id);
                SetEx( id, n + v );
      }
    /* ---------------------------------------------------------------------
       *
       *      AppEx(tended)2 will modify the value of the element
       *      while it will get the inner element closed by the statement
       *      > ... < and will remove all other letters outside of the
       *      statement.                        
       *
       *      This is the opposite of the GetEx2
       *              
       --------------------------------------------------------------------- */
      function AppEx2( id, v, p ) {
                var n = GetEx2( id, p );
                SetEx2( id, n + v, p );
      }
    /* ---------------------------------------------------------------------
       *
       *      AppX will expand the x-position value from the current
       *      to a larger one. Sample: if the current value is 50 and
       *      the v-parameter will deliver 18, than the new position
       *      will be set to 68.                       
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute.                               
       *
       --------------------------------------------------------------------- */
      function AppX( id, v ) {
          SetX( id, GetX(id) + v );
      }
    /* ---------------------------------------------------------------------
       *
       *      AppY will expand the y-position value from the current
       *      to a larger one. Sample: if the current value is 50 and
       *      the v-parameter will deliver 18, than the new position
       *      will be set to 68.                       
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute.                               
       *
       --------------------------------------------------------------------- */
      function AppY( id, v ) {
          SetY( id, GetY(id) + v );
      }
    /* ---------------------------------------------------------------------
       *
       *      AppW will resize the size of the element in the horizontal
       *      line from the current size to a larger one. If the current
       *      size is 150 and the v-parameter deliver 25, than the new
       *      size will be set to 175.                     
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the "width"-attribute by the stylesheet.
       *
       --------------------------------------------------------------------- */
      function AppW( id, v ) {
          SetW( id, GetW(id) + v );
      }
    /* ---------------------------------------------------------------------
       *
       *      AppH will resize the size of the element in the vertical
       *      line from the current size to a larger one. If the current
       *      size is 150 and the v-parameter deliver 25, than the new
       *      size will be set to 175.                     
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the "height"-attribute by the stylesheet.
       *
       --------------------------------------------------------------------- */
      function AppH( id, v ) {
          SetH( id, GetH(id) + v );
      }
    /* ---------------------------------------------------------------------
       *
       *      AppLH will resize the line-height of the element in the horizontal
       *      line from the current size to a larger one. If the current
       *      size is 150 and the v-parameter deliver 25, than the new
       *      size will be set to 175.                     
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the "line-height"-attribute by the stylesheet.
       *
       --------------------------------------------------------------------- */
      function AppLH( id, v ) {
          SetLH( id, GetLH(id) + v );
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      Red(uce) *
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      RedX will short the x-position value from the current
       *      to a smaller one. Sample: if the current value is 50 and
       *      the v-parameter will deliver 5, than the new position
       *      will be set to 45.
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute.                               
       *
       --------------------------------------------------------------------- */
      function RedX( id, v ) {
          SetX( id, GetX(id) - v );
      }
    /* ---------------------------------------------------------------------
       *
       *      RedY will expand the y-position value from the current
       *      to a smaller one. Sample: if the current value is 50 and
       *      the v-parameter will deliver 5, than the new position
       *      will be set to 45.                       
       *      
       *      Note: This function can only take effect, if the element
       *      is positioned absolute.                               
       *
       --------------------------------------------------------------------- */
      function RedY( id, v ) {
          SetY( id, GetY(id) - v );
      }
    /* ---------------------------------------------------------------------
       *
       *      RedW will resize the size of the element in the horizontal
       *      line from the current size to a smaller one. If the current
       *      size is 150 and the v-parameter deliver 25, than the new
       *      size will be set to 125.                     
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the "width"-attribute by the stylesheet.
       *
       --------------------------------------------------------------------- */
      function RedW( id, v ) {
          SetW( id, GetW(id) - v );
      }
    /* ---------------------------------------------------------------------
       *
       *      RedH will resize the size of the element in the vertical
       *      line from the current size to a smaller one. If the current
       *      size is 150 and the v-parameter deliver 25, than the new
       *      size will be set to 125.                     
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the "height"-attribute by the stylesheet.
       *
       --------------------------------------------------------------------- */
      function RedH( id, v ) {
          SetH( id, GetH(id) - v );
      }
    /* ---------------------------------------------------------------------
       *
       *      RedLH will resize the line-height of the element in the horizontal
       *      line from the current size to a smaller one. If the current
       *      size is 150 and the v-parameter deliver 25, than the new
       *      size will be set to 125.                     
       *      
       *      Note: This function can only take effect, if the element
       *      is sized by the "line-height"-attribute by the stylesheet.
       *
       --------------------------------------------------------------------- */
      function RedLH( id, v ) {
          SetLH( id, GetLH(id) - v );
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      Auto *    ( Toggle - functions )
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      AutoDisp will only take effect, if the "display"-attribute
       *      of the element is set to "none" or "block".
       *      
       *      The function will return the value from "none" to "block"
       *      and from "block" to "none" in each call.
       *      
       *      This function needs the id of the target element.                                                                              
       *
       --------------------------------------------------------------------- */
      function AutoDisp( id ) {

            if ( $_css(id).display == "none" ) {
                $_css(id).display = "block";
            } else if ( $_css(id).display == "block" ) {
                $_css(id).display = "none";
            }
      }
    /* ---------------------------------------------------------------------
       *
       *      aniAutoDisp will only take effect, if the "display"-attribute
       *      of the element is set to "none" or "block".
       *      
       *      The function will return the value from "none" to "block"
       *      and from "block" to "none" in each call.
       *      
       *      This function needs the id of the target element.                                                                              
       *
       --------------------------------------------------------------------- */
          function aniAutoDisp( id, vis_on, vis_off, mode, direction ) {
              switch( mode ) {
                  case 0:
                      if ( GetDisp( id ) == true ) {
                          aniAutoDisp( id, vis_on, vis_off, 1, direction );
                      } else if ( GetDisp( id ) == false ) {
                          aniAutoDisp( id, vis_on, vis_off, 2, direction );
                      }
                      break;
                  case 1:
                      if ( direction == 0 ) {
                          if ( GetH( id ) > vis_off ) {
                              SetH( id, GetH( id ) - vis_off );
                              setTimeout(
                                  function() {
                                      aniAutoDisp( id, vis_on, vis_off, 1, direction );
                                  }, 50
                              );
                          } else {
                              SetDisp( id, false );
                          }
                      } else if ( direction == 1 ) {
                          if ( GetW( id ) > vis_off ) {
                              SetW( id, GetW( id ) - vis_off );
                              setTimeout(
                                  function() {
                                      aniAutoDisp( id, vis_on, vis_off, 1, direction );
                                  }, 50
                              );
                          } else {
                              SetDisp( id, false );
                          }
                      }
                      break;
                  case 2:
                      if ( direction == 0 ) {
                          if ( GetH( id ) < vis_on ) {
                              if ( GetDisp( id ) == false ) { SetDisp( id, true ); }
                              SetH( id, GetH( id ) + vis_off );
                              setTimeout(
                                  function() {
                                      aniAutoDisp( id, vis_on, vis_off, 2, direction );
                                  }, 50
                              );
                          } else {
                              SetDisp( id, true );
                          }
                      } else if ( direction == 1 ) {
                          if ( GetW( id ) < vis_on ) {
                              if ( GetDisp( id ) == false ) { SetDisp( id, true ); }
                              SetW( id, GetW( id ) + vis_off );
                              setTimeout(
                                  function() {
                                      aniAutoDisp( id, vis_on, vis_off, 2, direction );
                                  }, 50
                              );
                          } else {
                              SetDisp( id, true );
                          }
                      }
                      break;
              };
          }
    /* ---------------------------------------------------------------------
       *
       *      aniAutoDispEx will only take effect, if the "display"-attribute
       *      of the element is set to "none" or "block".
       *      
       *      The function will return the value from "none" to "block"
       *      and from "block" to "none" in each call.
       *      
       *      This function needs the id of the target element.                                                                              
       *
       --------------------------------------------------------------------- */
          function aniAutoDispEx( id, vis_on, vis_off, mode, direction, Speed, CapScr, CapId ) {
              switch( mode ) {
                  case 0:
                      if ( GetDisp( id ) == true ) {
                          aniAutoDispEx( id, vis_on, vis_off, 1, direction, Speed, CapScr, CapId );
                      } else if ( GetDisp( id ) == false ) {
                          aniAutoDispEx( id, vis_on, vis_off, 2, direction, Speed, CapScr, CapId );
                      }
                      break;
                  case 1:
                      if ( direction == 0 ) {
                          if ( GetH( id ) > vis_off ) {
                              SetH( id, GetH( id ) - vis_off );
                              if ( CapId != "" ) { SetY( id, GetY(CapId) - GetH(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                }
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx( id, vis_on, vis_off, 1, direction, Speed, CapScr, CapId );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, false );
                              CallBack();
                          }
                      } else if ( direction == 1 ) {
                          if ( GetW( id ) > vis_off ) {
                              SetW( id, GetW( id ) - vis_off );
                              if ( CapId != "" ) { SetX( id, GetX(CapId) - GetH(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                }
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx( id, vis_on, vis_off, 1, direction, Speed, CapScr, CapId );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, false );
                              CallBack();
                          }
                      }
                      break;
                  case 2:
                      if ( direction == 0 ) {
                          if ( GetH( id ) < vis_on ) {
                              if ( GetDisp( id ) == false ) { SetDisp( id, true ); }
                              SetH( id, GetH( id ) + vis_off );
                              if ( CapId != "" ) { SetY( id, GetY(CapId) - GetH(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                } else if ( GetY( id ) < 0 ) {
                                    SetY( id, 0 );
                                }
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                } else if ( GetX( id ) < 0 ) {
                                    SetX( id, 0 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx( id, vis_on, vis_off, 2, direction, Speed, CapScr, CapId );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, true );
                              if ( CapId != "" ) { SetY( id, GetY(CapId) - GetH(id) ); }
                              CallBack();
                          }
                      } else if ( direction == 1 ) {
                          if ( GetW( id ) < vis_on ) {
                              if ( GetDisp( id ) == false ) { SetDisp( id, true ); }
                              SetW( id, GetW( id ) + vis_off );
                              if ( CapId != "" ) { SetX( id, GetX(CapId) - GetW(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                } else if ( GetY( id ) < 0 ) {
                                    SetY( id, 0 );
                                }
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                } else if ( GetX( id ) < 0 ) {
                                    SetX( id, 0 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx( id, vis_on, vis_off, 2, direction, Speed, CapScr, CapId );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, true );
                              if ( CapId != "" ) { SetX( id, GetX(CapId) - GetW(id) ); }
                              CallBack();
                          }
                      }
                      break;
              };
          }
    /* ---------------------------------------------------------------------
       *
       *      aniAutoDispEx2 will only take effect, if the "display"-attribute
       *      of the element is set to "none" or "block".
       *      
       *      The function will return the value from "none" to "block"
       *      and from "block" to "none" in each call.
       *      
       *      This function needs the id of the target element.                                                                              
       *
       --------------------------------------------------------------------- */
          function aniAutoDispEx2( id, vis_on, vis_off, mode, direction, Speed, CapScr, CapId, CallBack ) {
              switch( mode ) {
                  case 0:
                      if ( GetDisp( id ) == true ) {
                          aniAutoDispEx2( id, vis_on, vis_off, 1, direction, Speed, CapScr, CapId, CallBack );
                      } else if ( GetDisp( id ) == false ) {
                          aniAutoDispEx2( id, vis_on, vis_off, 2, direction, Speed, CapScr, CapId, CallBack );
                      }
                      break;
                  case 1:
                      if ( direction == 0 ) {
                          if ( GetH( id ) > vis_off ) {
                              SetH( id, GetH( id ) - vis_off );
                              if ( CapId != "" ) { SetY( id, GetY(CapId) - GetH(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                }
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx2( id, vis_on, vis_off, 1, direction, Speed, CapScr, CapId, CallBack );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, false );
                              CallBack();
                          }
                      } else if ( direction == 1 ) {
                          if ( GetW( id ) > vis_off ) {
                              SetW( id, GetW( id ) - vis_off );
                              if ( CapId != "" ) { SetX( id, GetX(CapId) - GetW(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                }
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx2( id, vis_on, vis_off, 1, direction, Speed, CapScr, CapId, CallBack );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, false );
                              CallBack();
                          }
                      }
                      break;
                  case 2:
                      if ( direction == 0 ) {
                          if ( GetH( id ) < vis_on ) {
                              if ( GetDisp( id ) == false ) { SetDisp( id, true ); }
                              SetH( id, GetH( id ) + vis_off );
                              if ( CapId != "" ) { SetY( id, GetY(CapId) - GetH(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                } else if ( GetY( id ) < 0 ) {
                                    SetY( id, 0 );
                                }
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                } else if ( GetX( id ) < 0 ) {
                                    SetX( id, 0 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx2( id, vis_on, vis_off, 2, direction, Speed, CapScr, CapId, CallBack );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, true );
                              if ( CapId != "" ) { SetY( id, GetY(CapId) - GetH(id) ); }
                              CallBack();
                          }
                      } else if ( direction == 1 ) {
                          if ( GetW( id ) < vis_on ) {
                              if ( GetDisp( id ) == false ) { SetDisp( id, true ); }
                              SetW( id, GetW( id ) + vis_off );
                              if ( CapId != "" ) { SetX( id, GetX(CapId) - GetW(id) ); }
                              if ( CapScr == true ) {
                                UpdateSize();
                                if ( GetX( id ) > wepiPageW - GetW( id ) ) {
                                    SetX( id, wepiPageW - GetW( id ) - 20 );
                                } else if ( GetY( id ) < 0 ) {
                                    SetY( id, 0 );
                                }
                                if ( GetY( id ) > wepiPageH - GetH( id ) ) {
                                    SetY( id, wepiPageH - GetH( id ) - 20 );
                                } else if ( GetX( id ) < 0 ) {
                                    SetX( id, 0 );
                                }
                              }
                              setTimeout(
                                  function() {
                                      aniAutoDispEx2( id, vis_on, vis_off, 2, direction, Speed, CapScr, CapId, CallBack );
                                  }, Speed
                              );
                          } else {
                              SetDisp( id, true );
                              if ( CapId != "" ) { SetX( id, GetX(CapId) - GetW(id) ); }
                              CallBack();
                          }
                      }
                      break;
              };
          }
    /* ---------------------------------------------------------------------
       *
       *      AutoVisible will only take effect, if the "visibility"-attribute
       *      of the element is set to "hidden" or "visible".
       *      
       *      The function will return the value from "hidden" to "visible"
       *      and from "visible" to "hidden" in each call.    
       *      
       *      This function needs the id of the target element.                                                                        
       *
       --------------------------------------------------------------------- */
      function AutoVisible( id ) {
      
            if ( $_css(id).visibility == "hidden" ) {
                $_css(id).visibility = "visible";
            } else if ( $_css(id).visibility == "visible" ) {
                $_css(id).visibility = "hidden";
            }
      }
    /* ---------------------------------------------------------------------
       *
       *      AutoNegt will automatically negate the value from positive
       *      to negative or negative to positive value.       
       *
       --------------------------------------------------------------------- */
      function AutoNegt( v ) {
            if ( v >= 0 ) {
                return -v;
            } else if ( v < 0 ) {
                return --v;
            }
      }
    /* ---------------------------------------------------------------------
       *
       *      AutoX will only take effect, if the element is positioned
       *      absolutly and the "left"-attribute is set.       
       *      
       *      The function will move the element in the same x-distance
       *      from the left-side to the right-side or from the right-side
       *      to the left-side.
       *      
       *      This function needs the id of the element.                                                                                            
       *
       --------------------------------------------------------------------- */
      function AutoX( id ) {
          var n = GetX( id );
          UpdateSize();
          if ( n <= ( wepiPageW / 2 ) ) {
              SetX( id, wepiPageW - n );
          } else if ( n > ( wepiPageW / 2 ) ) {
              SetX( id, n - wepiPageW );
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      AutoY will only take effect, if the element is positioned
       *      absolute and the "top"-attribute is set.       
       *      
       *      The function will move the element in the same y-distance
       *      from the top-side to the bottom-side or from the bottom-side
       *      to the top-side.
       *      
       *      This function needs the id of the element.                                                                                            
       *
       --------------------------------------------------------------------- */
      function AutoY( id ) {
          var n = GetY( id );
          UpdateSize();
          if ( n <= ( wepiPageH / 2 ) ) {
              SetH( id, wepiPageH - n );
          } else if ( n > ( wepiPageH / 2 ) ) {
              SetH( id, n - wepiPageH );
          }
      }
    /* ---------------------------------------------------------------------
       *
       *      RadioDisp will only take effect, if the "display"-attribute
       *      of the element is set to "none" or "block".
       *      
       *      The function will return the value from "none" to "block"
       *      and from "block" to "none" in each call.
       *      
       *      This function needs the id of the target element.                                                                              
       *
       --------------------------------------------------------------------- */
      function RadioDisp() {
		  var i = 0;
		  // *** //
		  for ( i = 1; i < arguments.length; i++ ) {
			if ( $_id(arguments[i]) ) { $_css(arguments[i]).display = "none"; }
		  }
		  // *** //
		  if ( $_id(arguments[0]) ) { $_css(arguments[0]).display = "block"; }
      }
/* --------------------------------------------------------------------------------
      modifyUTF
   -------------------------------------------------------------------------------- */
	function modifyUTF( value ) {
		var i = 0; var tmpt = "";
		// *** //
		for ( i = 0; i < value.length; i++ ) {
			if ( value.charCodeAt(i) > 127 ) {
				tmpt += "&#" + value.charCodeAt(i) + ";";
			} else {
				if ( value.charCodeAt(i) == 32 ) {
					tmpt += "&nbsp;";
				} else if ( value.charAt(i) == '&' ) {
					tmpt += "&amp;";
				} else {
					tmpt += value.charAt(i);
				}
			}
		}
		// *** //
		return tmpt;
	}
/* --------------------------------------------------------------------------------
      Clone - Function
   -------------------------------------------------------------------------------- */
      function Clone( src, cnt, idName ) {
          var i = 0; var s = "";
          
          for ( i = 0; i < cnt; i++ ) {
          
              s = src;
              s.replace( "??", idName + (i + 1) );
              print(s);
          
          }
      }
/* --------------------------------------------------------------------------------
   --------------------------------------------------------------------------------
      Tag Extenders
   --------------------------------------------------------------------------------
   -------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------
       *
       *      Delivers the Browser-specification to find out, which way of
       *      Event-Handling can be used on the current browser. It decides
       *      between W3C compatible Browsers like GECKO and WEBKIT based
       *      and the Opera Browser and the Microsoft Internet Explorer.   
       *
       --------------------------------------------------------------------- */
    function wepiEventType( event ) {
      	var which;
      	var msie_var  = "srcElement"; // Identify Internet Explorer
      	var gecko_var = "target";  // Identify GECKO or WEBKIT based Browsers and Opera
      	evt[gecko_var] ? which = evt[gecko_var] : which = evt[msie_var];
      	if ( which == evt[gecko_var] ) {
            return "W3C";
        } else if ( which == evt[msie_var] ) {
            return "IE";
        }
    }
    /* ---------------------------------------------------------------------
       *
       *      Delivers the Event-Object of the current Browser.
       *      You can get the W3C compatible Object of GECKO, WEBKIT and
       *      Opera Browser or the Microsoft Internet Explorer Event
       *      Handler-Object.         
       *
       --------------------------------------------------------------------- */
    function wepiEvent( event ) {
      	var which;
      	var msie_var  = "srcElement"; // Identify Internet Explorer
      	var gecko_var = "target";  // Identify GECKO or WEBKIT based Browsers and Opera
      	evt[gecko_var] ? which = evt[gecko_var] : which = evt[msie_var];
        return which;
    }
    /* ---------------------------------------------------------------------
       *
       *      Allows direct connection of an element to an event with a
       *      callback and will automatically find out the correct event
       *      handler object.      
       *
       --------------------------------------------------------------------- */
    function wepiAddEventDOM( id, event, functionName ) {
        if ( id != "" ) {
          if ( $_id(id) ) {
            if ( window.addEventListener ) {
                $_id(id).addEventListener( event, functionName, false );
            } else if ( window.attachEvent ) {
                $_id(id).attachEvent("on" + event, functionName );
            }
          }
        } else {
          if ( window.addEventListener ) {
              window.addEventListener( event, functionName, false );
          } else if ( window.attachEvent ) {
              window.attachEvent("on" + event, functionName );
          }        
        }
    }
    /* ---------------------------------------------------------------------
       *
       *      Allows direct connection of an element to an event with a
       *      callback and will automatically find out the correct event
       *      handler object. This one is virtual.
       *
       --------------------------------------------------------------------- */
    function wepiAddEventDOMv( id, event, functionName ) {
        print(
            '<script type = "text/javascript">' +
            '   wepiAddEventDOM(' +
            '   ' + id + ', ' +
            '   ' + event + ', ' +
            '   ' + functionName +
            '   );' +
            '</script>'
        )
    }
    /* ---------------------------------------------------------------------
       *
       *      Returns a stream of event-connections directly in an element-
       *      tag and will connect every event with a standartized function
       *      name. Sample:
       *      
       *      ...
       *      wepiAddEvent( "adi", "my", "a,b" );   
       *      ...
       *
       *      Will create the following context to the element:
       *
       *      onclick     = "javascript:my_click(a,b);"
       *      onmousedown = "javascript:my_mouse_down(a,b);"
       *      onmouseup   = "javascript:my_mouse_up(a,b);"      
       *
       --------------------------------------------------------------------- */
    function wepiAddEvent( events, event_head, params ) {
        var i = 0; var s = "";
        for ( i = 0; i < events.length; i++ ) {
            switch ( events.charAt(i) ) {
                case 'a': s = s + " onclick = \"javascript:" + event_head + "_click( " + params + " );\" "; break;
                case 'b': s = s + " ondblclick = \"javascript:" + event_head + "_dblclick( " + params + " );\" "; break;
                case 'c': s = s + " onchange = \"javascript:" + event_head + "_change( " + params + " );\" "; break;
                case 'd': s = s + " onmousedown = \"javascript:" + event_head + "_mouse_down( " + params + " );\" "; break;
                case 'e': s = s + " onmousemove = \"javascript:" + event_head + "_mouse_move( " + params + " );\" "; break;
                case 'f': s = s + " onmouseover = \"javascript:" + event_head + "_mouse_over( " + params + " );\" "; break;
                case 'g': s = s + " onmouseenter = \"javascript:" + event_head + "_mouse_enter( " + params + " );\" "; break;
                case 'h': s = s + " onmouseout = \"javascript:" + event_head + "_mouse_out( " + params + " );\" "; break;
                case 'i': s = s + " onmouseup = \"javascript:" + event_head + "_mouse_up( " + params + " );\" "; break;
                case 'j': s = s + " onkeypress = \"javascript:" + event_head + "_key_press( " + params + " );\" "; break;
                case 'k': s = s + " onkeydown = \"javascript:" + event_head + "_key_down( " + params + " );\" "; break;
                case 'l': s = s + " onkeyup = \"javascript:" + event_head + "_key_up( " + params + " );\" "; break;
            }
        }
        return s;
    }
    /* ---------------------------------------------------------------------
       *
       *      Returns a stream of an event-connection directly in an element-
       *      tag and will connect the event with a standartized function
       *      name. Sample:
       *      
       *      ...
       *      wepiAddEventSin( "click", "my", "a,b", "alert('Great!!!');" );   
       *      ...
       *
       *      Will create the following context to the element:
       *
       *      onclick     = "javascript:my_click(a,b);alert('Great!!!');"     
       *
       --------------------------------------------------------------------- */
    function wepiAddEventSin( event, event_head, params, extension ) {
        var s = "";
        if ( event == "click" ) {
            s = ' onclick = "javascript:' + event_head + "_click( " + params + " );" + extension + '" ';
        } else if ( event == "dbl_click" ) {
            s = ' ondblclick = "javascript:' + event_head + "_dblclick( " + params + " );" + extension + '" ';
        } else if ( event == "change" ) {
            s = ' onchange = "javascript:' + event_head + "_change( " + params + " );" + extension + '" ';
        } else if ( event == "mouse_down" ) {
            s = ' onmousedown = "javascript:' + event_head + "_mouse_down( " + params + " );" + extension + '" ';
        } else if ( event == "mouse_move" ) {
            s = ' onmousemove = "javascript:' + event_head + "_mouse_move( " + params + " );" + extension + '" ';
        } else if ( event == "mouse_over" ) {
            s = ' onmouseover = "javascript:' + event_head + "_mouse_over( " + params + " );" + extension + '" ';
        } else if ( event == "mouse_enter" ) {
            s = ' onmouseenter = "javascript:' + event_head + "_mouse_enter( " + params + " );" + extension + '" ';
        } else if ( event == "mouse_out" ) {
            s = ' onmouseout = "javascript:' + event_head + "_mouse_out( " + params + " );" + extension + '" ';
        } else if ( event == "mouse_up" ) {
            s = ' onmouseup = "javascript:' + event_head + "_mouse_up( " + params + " );" + extension + '" ';
        } else if ( event == "key_press" ) {
            s = ' onkeypress = "javascript:' + event_head + "_key_press( " + params + " );" + extension + '" ';
        } else if ( event == "key_down" ) {
            s = ' onkeydown = "javascript:' + event_head + "_key_down( " + params + " );" + extension + '" ';
        } else if ( event == "key_up" ) {
            s = ' onkeyup = "javascript:' + event_head + "_key_up( " + params + " );" + extension + '" ';
        }
        return s;
    }

	/* ---------------------------------------------------------------------
	*
	*      Expand the height of an iframe-tag for it's content-need's
	*      automatically.
	*
	--------------------------------------------------------------------- */
	function SetIFrameHeight(obj) {
		obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';			
	}

	function SetIFrameWidth(obj) {
		obj.style.width = obj.contentWindow.document.body.scrollWidth + 'px';			
	}

	function SetIFrameSize(obj) {
		obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
		obj.style.width = obj.contentWindow.document.body.scrollWidth + 'px';			
	}

