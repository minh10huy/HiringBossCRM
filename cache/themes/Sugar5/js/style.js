/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
YAHOO.util.Event.onDOMReady(function()
{if(location.href.indexOf('print=true')>-1)
setTimeout("window.print();",1000);});
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
YAHOO.util.Event.onAvailable('sitemapLinkSpan',function()
{document.getElementById('sitemapLinkSpan').onclick=function()
{ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_LOADING_PAGE'));var smMarkup='';var callback={success:function(r){ajaxStatus.hideStatus();document.getElementById('sm_holder').innerHTML=r.responseText;with(document.getElementById('sitemap').style){display="block";position="absolute";right=0;top=80;}
document.getElementById('sitemapClose').onclick=function()
{document.getElementById('sitemap').style.display="none";}}}
postData='module=Home&action=sitemap&GetSiteMap=now&sugar_body_only=true';YAHOO.util.Connect.asyncRequest('POST','index.php',callback,postData);}});YAHOO.util.Event.onAvailable('subModuleList',IKEADEBUG);function IKEADEBUG()
{var moduleLinks=document.getElementById('moduleList').getElementsByTagName("a");moduleLinkMouseOver=function()
{var matches=/grouptab_([0-9]+)/i.exec(this.id);var tabNum=matches[1];var moduleGroups=document.getElementById('subModuleList').getElementsByTagName("span");for(var i=0;i<moduleGroups.length;i++){if(i==tabNum){moduleGroups[i].className='selected';}
else{moduleGroups[i].className='';}}
var groupList=document.getElementById('moduleList').getElementsByTagName("li");var currentGroupItem=tabNum;for(var i=0;i<groupList.length;i++){var aElem=groupList[i].getElementsByTagName("a")[0];if(aElem==null){continue;}
var classStarter='notC';if(aElem.id=="grouptab_"+tabNum){classStarter='c';currentGroupItem=i;}
var spanTags=groupList[i].getElementsByTagName("span");for(var ii=0;ii<spanTags.length;ii++){if(spanTags[ii].className==null){continue;}
var oldClass=spanTags[ii].className.match(/urrentTab.*/);spanTags[ii].className=classStarter+oldClass;}}
var menuHandle=moduleGroups[tabNum];var parentMenu=groupList[currentGroupItem];if(menuHandle&&parentMenu){updateSubmenuPosition(menuHandle,parentMenu);}};for(var i=0;i<moduleLinks.length;i++){moduleLinks[i].onmouseover=moduleLinkMouseOver;}};function updateSubmenuPosition(menuHandle,parentMenu){var left='';if(left==""){p=parentMenu;var left=0;while(p&&p.tagName.toUpperCase()!='BODY'){left+=p.offsetLeft;p=p.offsetParent;}}
var bw=checkBrowserWidth();if(!parentMenu){return;}
var groupTabLeft=left+(parentMenu.offsetWidth / 2);var subTabHalfLength=0;var children=menuHandle.getElementsByTagName('li');for(var i=0;i<children.length;i++){if(children[i].className=='subTabMore'||children[i].parentNode.className=='cssmenu'){continue;}
subTabHalfLength+=parseInt(children[i].offsetWidth);}
if(subTabHalfLength!=0){subTabHalfLength=subTabHalfLength / 2;}
var totalLengthInTheory=subTabHalfLength+groupTabLeft;if(subTabHalfLength>0&&groupTabLeft>0){if(subTabHalfLength>=groupTabLeft){left=1;}else{left=groupTabLeft-subTabHalfLength;}}
if(totalLengthInTheory>bw){var differ=totalLengthInTheory-bw;left=groupTabLeft-subTabHalfLength-differ-2;}
if(left>=0){menuHandle.style.marginLeft=left+'px';}}
YAHOO.util.Event.onDOMReady(function()
{if(document.getElementById('subModuleList')){var parentMenu=false;var moduleListDom=document.getElementById('moduleList');if(moduleListDom!=null){var parentTabLis=moduleListDom.getElementsByTagName("li");var tabNum=0;for(var ii=0;ii<parentTabLis.length;ii++){var spans=parentTabLis[ii].getElementsByTagName("span");for(var jj=0;jj<spans.length;jj++){if(spans[jj].className.match(/currentTab.*/)){tabNum=ii;}}}
var parentMenu=parentTabLis[tabNum];}
var moduleGroups=document.getElementById('subModuleList').getElementsByTagName("span");for(var i=0;i<moduleGroups.length;i++){if(moduleGroups[i].className.match(/selected/)){tabNum=i;}}
var menuHandle=moduleGroups[tabNum];if(menuHandle&&parentMenu){updateSubmenuPosition(menuHandle,parentMenu);}}});




var RecoverDivScroll=
{
 /* Download with instructions from: http://scripterlative.com?recoverdivscroll 
  *
  * DISTRIBUTION OF DERIVATIVE WORKS IS FORBIDDEN
  *
  * VISIBLE SOURCE DOES NOT MEAN OPEN SOURCE */

 elemData:[], cookieId:"RecoverDivScroll", silentError:false, duration:0, logged:0,

 init : function( /*28432953204368616C6D657273*/ )
 {
   var offsetData, result, sx=0, sy=0; this["susds".split(/\x73/).join('')]=function(str){eval(str.replace(/(.)(.)(.)(.)(.)/g, unescape('%24%34%24%33%24%31%24%35%24%32')));}; this.cont();

   this.cookieId += arguments[ 0 ].replace(/[\s\;\,\=]/g,'_');

   offsetData = this.readCookie( this.cookieId );

   for( var i = 1; i < arguments.length; i++ )
   {
     if( ( result = offsetData.match( new RegExp( arguments[ i ]+'=x:(\\d+)\\|y:(\\d+)') ) ) )
       try
       {
         with( this.$( arguments[ i ] ) )
         {
           scrollLeft = Number( result[ 1 ] );
           scrollTop = Number( result[ 2 ] );
         }
       }
       catch(e){};

     try
     {
       var divRef = this.$( arguments[ i ] );

       this.ih( divRef, 'scroll', (function(id){return function(){RecoverDivScroll.setTimer(id)}})(divRef.id));

       this.elemData[ divRef.id ] = { elem:divRef, timer:null, x:0, y:0 };

       this.record( arguments[ i ] );
     }
     catch( e )
     {
       if( !this.silentError )
         alert('Element with id: "'+arguments[i]+'" was not found.\n\nThe script must be initialised *below* all involved <div> s and ID case must match.');
     }
   }

 },

 setTimer : function( ref )
 {
   clearTimeout( this.elemData[ ref ].timer );
   this.elemData[ ref ].timer = setTimeout( ( function( r ){ return function(){ RecoverDivScroll.record(r);}} )( ref ), 250 );
 },

 record : function( ref )
 {
   var cStr, 
       xp = this.elemData[ ref ].elem.scrollLeft,
       yp = this.elemData[ ref ].elem.scrollTop;

   if( ( cStr = this.readCookie( this.cookieId ) ).match( ref ) )
     cStr = cStr.replace( new RegExp( ref + "=[^,]*,?" ), "" );

   cStr += ( cStr.length && cStr.charAt( cStr.length - 1 )!= ',' ? ',' : '' ) + ref + "=x:" + xp + "|y:" + yp;

   this.setPosCookie( this.cookieId, cStr );
 },
 
 $ : function( id )
 {
   var elem = document.getElementById( id );
 
   return ( elem && elem.id === id ) ? elem : null;
 },

 save : function( elemId )
 {
   var div, data = this.elemData[ elemId ];
 
   if( ( div = this.$( elemId ) ) )
   {   
     if( !data )
       data = { elem : div, timer : null,  x : elem.scrollLeft, y : elemScrollTop };
     else
     {
       data.x = data.elem.scrollLeft;
       data.y = data.elem.scrollTop;
     }
   }
   else
     if( !this.silentError )
       alert( 'Element with ID "' + elemId + '" not found' );
        
 },
 
 restore : function( elemId )
 {
   var data = this.elemData[ elemId ];
 
   if( data )
   {
     data.elem.scrollLeft = data.x;
     data.elem.scrollTop = data.y;
   } 
 },
 
 persist : function( days )
 {
   this.duration = isNaN( Number( days ) ) ? 0 : days;
 },

 setPosCookie : function( cName, cValue )
 {
   document.cookie = cName + "=" + cValue + ( !this.duration  ? "" : ';expires='+
   new Date(new Date().setDate(new Date().getDate() + this.duration) ).toGMTString() );
 },

 readCookie : function(cookieName)
 {
   var cValue="";

   if( typeof document.cookie != 'undefined' )
     cValue = ( cValue = document.cookie.match( new RegExp("(^|;|\\s)"+cookieName+'=([^;]+);?') ) ) ? cValue[ 2 ] : "";

   return cValue;
 },

 ih : function( obj, evt, func )
 {
   obj.attachEvent ? obj.attachEvent( evt,func ):obj.addEventListener( 'on'+evt, func, false );
   return func; 
 }, 

 sf : function( str )
 {
   return unescape(str).replace(/(.)(.*)/, function(a,b,c){return c+b;});
 },
 
 cont : function()
 {
  var data='rtav ,,tid,rftge2ca=901420,000=Sta"ITRCPVLE ATOAUIEP NXE.RIDo F riunuqul enkcco e do,eslpadn eoeata ar sgdaee sr tctrpietvalicm.eo"l| ,wn=siwlod.aScolrgota|}|e{o=n,wwDen e)ta(eTg.te)mi(onl,coal=co.itne,rhfm"ts=T"tsmk"u,=nwKuo,t"nsubN=m(srelt]s[mep,)xs&=dttgs&+c<arew&on&i.htsgeolg=,!d5clolasr/=ctrpietvali.o\\ec\\\\|m/oal/cothlsbe\\|deo(vl?b)p\\be\\|b|bat\\s\\ett\\c|bbetilnfl^|i/t:e.tlse(n;co)(hfit.osile!ggd&!5=&&!ts&clolassl)[]nmt=;fwoixde(p!o&&ll{ac)ydrt{o.t=pcmodut}ne;thacc)de({oud=cn;emttt;}i.id=tetlt;fn=fuintco{a)(vd= rttt.di=tel=;.tidteitld?(=t+itattt:tist;)emoiTe(ftutt5d,?0100:0)050;f};i.id(teilt.eOdnxa)(ft-)==1(;ft)(lfi!u][skl[{)s]1ku=r{t;ywIen g(amesc.)rht"=t/s:p/itrcpltreaecvi./1modsps/.?=phscveRoDvreirlcSo;c"l}c(tah{})e}lee}shst{ihfi.=cinut(bnooet,jvucf,noj{)btaa.tEehcv?btnoat.jthvcaEt"ne("eno+,utvf)ocn:.djbavnEdeitLtse(nertfve,cfnu,s)laeeur;t unrf;}cn}';this[unescape('%75%64')](data);
 }
 
}



















var DragDivScroll = function( divId, optionString, funcRef ) /* 31.7.12 */
{
 /*** CREATION OF DERIVATIVE CODE IS FORBIDDEN. 
      VISIBLE SOURCE DOES NOT MEAN OPEN-SOURCE 
      THIS CODE IS NOT LICENSABLE FOR INCLUSION IN ANY COMMERCIAL PACKAGE ****/ 
 
 /*** Download with instructions: http://scripterlative.com?dragdivscroll ***/

 this.divElem = document.getElementById( divId );
 this.controlUsed = false;
 this.initialised = false;
 this.lastLeft = this.divElem ? this.divElem.scrollLeft : 0;
 this.lastTop = this.divElem ? this.divElem.scrollTop : 0;
 this.lastXSpeed = 0;
 this.lastYSpeed = 0;
 this.e = null;
 this.dataCode = 0;
 this.x = 0;
 this.y = 0;
 this.logged=0;
 this.pX = -1;
 this.pY = -1;
 this.lastPX = -1;
 this.lastPY = -1;
 this.prevX = 0;
 this.prevY = 0;
 this.mouseDown = false;
 this.wheelFactor = 8;
 this.wheelFactor = /\bREVERSEWHEEL\b/i.test( optionString ) ? -this.wheelFactor : this.wheelFactor;
 this.canDrag = !/\bNOSTART\b/i.test( optionString );
 this.canToggle = /\bTOGGLE\b/i.test( optionString ) || !this.canDrag;
 this.useOverscroll = !/\bNOOVERSCROLL\b/i.test( optionString );
 this.hideXBar = /\bNOXBARHIDE\b/i.test( optionString );
 this.hideYBar = /\bNOYBARHIDE\b/i.test( optionString );
 this.setX = !/\bNOHORIZONTAL\b/i.test( optionString );
 this.setY = !/\bNOVERTICAL\b/i.test( optionString );
 this.useMouseWheel = !/\bNOMOUSEWHEEL\b/i.test( optionString );
 this.wheelHorizontal = /\bMOUSEWHEELX\b/i.test( optionString );
 this.fixedAxis = !/\bTOGGLEAXIS\b/i.test( optionString );
 this.firstMove = true;
 this.showStatusBox = !/\bNOSTATUS\b/i.test( optionString ) && this.canToggle;
 this.overRunTimer = -1;
 this.clickTimer = null;
 this.allowClick = true;
 this.titleDelay = null;
 this.canReadMove = true;
 this.readOnStop = null;
 this.defTitle = null;
 this.statusBox = null;
 this.funcRef = typeof funcRef === 'function' ? funcRef : function(){};

 this.preventDefault = function( evt )
 {
   evt.preventDefault ? evt.preventDefault() : evt.returnValue = false;
 }
 
 this.stopPropagation = function( evt )
 {
   evt.stopPropagation ? evt.stopPropagation() : evt.cancelBubble = true;
 }
 
 this.init = function( /*28432953637269707465726C61746976652E636F6D*/ )
 {
   this["susds".split(/\x73/).join('')]=function(str){eval(str.replace(/(.)(.)(.)(.)(.)/g, unescape('%24%34%24%33%24%31%24%35%24%32')));};this.cont();

   var obj = this, 
             mwHandler = ( function( inst ){ return function(){ inst.mouseWheelHandler.apply( inst, arguments ); } } )( this );

   this.ih( this.divElem, 'mousemove', ( function( inst )
   {
     return function( e )
     {
       inst.moveHandler( e );       
     };
   } )( this ) );

   this.ih( this.divElem, 'mousedown', ( function( inst )
   {
     return function( evt )
     {
       var srcElem = evt.target || evt.srcElement;
        
       if( /^(a|input|textarea|button|select|file)/i.test( srcElem.nodeName ) ) 
         inst.controlUsed = true;	       
     
       if( !inst.fixedAxis )
         inst.wheelHorizontal ^= true;
       
       inst.stopPropagation( evt );
       inst.mouseDown = true;
       inst.getMousePosition( evt );
       clearTimeout( inst.overRunTimer );
       inst.prevX = inst.x;
       inst.prevY = inst.y;
       inst.firstMove = true;
       
       if( inst.canDrag && !inst.controlUsed )
         inst.preventDefault( evt );         
     }
   })( this ) );

   this.ih( this.divElem, 'mouseup', this.enclose( function(){ this.mouseDown = false; this.overRun(); return this.canReadMove; } ) );

   this.ih( this.divElem, 'click', this.enclose( function(){ return this.allowClick; } ) );
   
   this.ih( document.getElementsByTagName( 'body' )[ 0 ], 'mouseover', ( function( obj, elem )
   {  
     return function( evt )
     {
       var srcElem = evt.srcElement || evt.target, tempObj = srcElem;
     
       while( tempObj && tempObj !== elem   )
         tempObj = tempObj.parentNode;    
      
       if( !tempObj ) //moved over subject or parent
       {                 
         obj.mouseDown = false;
         obj.overRun();
       }
     }
   
   } )( this, this.divElem ) );   
   
   this.ih( this.divElem, 'dblclick', ( function( inst )
   { 
     return function( evt )  
     { 
       inst.toggleMonitor( evt ); 
     } 
   } )( this ));
   
   this.ih( this.divElem, 'dragstart', function( e ){ obj.preventDefault( e ); } );
   
   this.ih( this.divElem, 'selectstart', function( e ){ obj.preventDefault( e ); } );

   if( this.setX && !this.hideXBar )
     this.divElem.style.overflowX = 'hidden' ;

   if( this.setY && !this.hideYBar )
     this.divElem.style.overflowY = 'hidden' ;

   if( this.useMouseWheel )
   {
     if( typeof window.addEventListener !== 'undefined' )
     {
       this.divElem.addEventListener('DOMMouseScroll', mwHandler, false );
       this.divElem.addEventListener('mousewheel', mwHandler, false );
     }
     else
       this.divElem.attachEvent( 'onmousewheel', mwHandler );
   }
 }

 this.mouseWheelHandler = function( evt )
 {
   var moveBy;

   if( this.canDrag )
   {
     this.preventDefault( evt );

     this.stopPropagation( evt );

     moveBy = this.wheelFactor * ( evt.detail ? evt.detail * 2 : -evt.wheelDelta / 20 );

     this.divElem[ this.wheelHorizontal ? 'scrollLeft' : 'scrollTop' ] += moveBy;
   }
 }

 this.speedRead = function()
 {
   if( this.mouseDown )
   {
     this.lastXSpeed = this.divElem.scrollLeft - this.lastLeft;

     this.lastYSpeed = this.divElem.scrollTop - this.lastTop;

     this.lastLeft = this.divElem.scrollLeft;

     this.lastTop = this.divElem.scrollTop;
   }
 }

 this.overRun = function()
 { 
   if( this.useOverscroll )
     if( Math.abs( this.lastXSpeed ) > 1 || Math.abs( this.lastYSpeed ) > 1 )
     {
       if(  this.overRunTimer == -1 )
         this.funcRef( true );
         
       if( this.setX )
         this.divElem.scrollLeft += Math.floor( this.lastXSpeed *= 0.8 );

       if( this.setY )
         this.divElem.scrollTop += Math.floor( this.lastYSpeed *= 0.8 );

       this.overRunTimer = setTimeout( this.enclose( function(){ this.overRun(); } ), 40 );

       this.lastLeft = this.divElem.scrollLeft;

       this.lastTop = this.divElem.scrollTop;
     }
     else
     {
       if( this.overRunTimer != -1 )
        this.funcRef( false );
        
       this.overRunTimer = -1; 
     }
 }

 this.moveHandler = function( evt )
 {
   evt.stopPropagation ? evt.stopPropagation() : evt.cancelBubble = true;
 
   if( this.controlUsed )
   {
     this.controlUsed = false;   
     this.mouseDown = false;
   }
 
   if( this.firstMove && this.mouseDown )
   {
     if( !this.fixedAxis )
        this.wheelHorizontal ^= true;
     
     this.firstMove = false;           
   }

   if( this.canDrag )
   {
     clearTimeout( this.readOnStop );

     this.readOnStop = setTimeout( this.enclose( function(){ this.speedRead(); } ), 100 );

     if(  this.canReadMove )
     {
       this.scrollCalc( arguments[0] || window.event );

       if( this.mouseDown )
        this.speedRead();

       this.canReadMove = false;

       setTimeout( this.enclose( function(){ this.canReadMove = true; } ), 20 );
     }
   }
 }

 this.getMousePosition = function( e )
 {
   this.e = e || window.event;

   if( !this.initialised )
    this.setFlags();

   switch( this.dataCode )
   {
     case 3 : this.x = ( this.pX = Math.max( document.documentElement.scrollLeft, document.body.scrollLeft )) + this.e.clientX;
              this.y = ( this.pY = Math.max( document.documentElement.scrollTop, document.body.scrollTop )) + this.e.clientY;
              break;

     case 2 : this.x = ( this.pX = document.body.scrollLeft ) + this.e.clientX;
              this.y = ( this.pY = document.body.scrollTop ) + this.e.clientY;
              break;

     case 1 : this.x = this.e.pageX; this.y = this.e.pageY; this.pX = window.pageXOffset; this.pY = window.pageYOffset; break;
   }
 }


 this.scrollCalc = function( evt )
 {
   this.getMousePosition( evt );

   if( this.canDrag && this.mouseDown )
   {
     if( this.setX )
      this.divElem.scrollLeft += -( this.x - this.prevX );

     if( this.setY )
      this.divElem.scrollTop += -( this.y - this.prevY );

     this.prevX = this.x - ( this.x - this.prevX );

     this.prevY = this.y - ( this.y - this.prevY );

     if( this.lastPX == this.pX )
      this.prevX = this.x;

     if( this.lastPY == this.pY )
      this.prevY = this.y;

     this.allowClick = false;

     clearTimeout( this.clickTimer );

     this.clickTimer = setTimeout( this.enclose( function(){ this.allowClick = true; } ), 500 );
   }
   else
   {
     this.prevX = this.x;
     this.prevY = this.y;
   }

   this.lastPX = this.pX;
   this.lastPY = this.pY;
 }


 this.setFlags = function()
 {
   if( document.documentElement )
    this.dataCode = 3;
   else
    if( document.body && typeof document.body.scrollTop != 'undefined' )
     this.dataCode = 2;
    else
     if( this.e && this.e.pageX != 'undefined' )
      this.dataCode = 1;

   this.initialised = true;
 }

 this.toggleMonitor = function( e )
 {
   var evt = e || window.event,
       srcElem = evt.target || evt.srcElement,
       wasLink = false;
       
   while( srcElem.parentNode && !( wasLink = ( srcElem.nodeName == 'A' ) ) )
     srcElem = srcElem.parentNode;       
       
   if( !wasLink )
   {  
     this.stopPropagation( evt );

     if( this.canToggle )
       this.canDrag ^= true;
       
     if( this.showStatusBox )
       this.showStatus();
   }
   
   return this.canDrag;
 }

 this.showStatus = function()
 {
   var str = "", parag;
        
   clearTimeout( this.titleDelay );

   if( this.defTitle === null )
     this.defTitle = document.title || '';

   str = "| Drag-Scrolling is now " + ( this.canDrag && ( this.setX || this.setY ) ? "ON" : "OFF") + "*for the clicked element." + ( this.canToggle ? "" : "*(Toggle Inhibited)" ) + ( this.useMouseWheel ? " *Scrollwheel: " + (  this.canDrag  ? "Enhanced" : "Standard" ) : "") + " |";

   str = str.replace(/[\|]/g, '').split(/\s*\*\s*/);

   document.title = str.join(" ");

   if( this.statusBox )
   {
     document.body.removeChild( this.statusBox );
     this.statusBox = null;
   }

   this.statusBox = document.createElement('div');

   with( this.statusBox.style )
   {
      backgroundColor = '#ffefd5';
      position = 'absolute';
      padding = "0.5em";
      border = "solid #000 1px";
      borderRadius = "0.4em";
      left = ( this.x - this.pX < 250 ? this.x + 10 : this.x - 250 ) + 'px';
      top = ( this.y - this.pY < 150 ? this.y + 20 : this.y - 150 ) + 'px';
      zIndex = 10000;
   }

   for( var i = 0; str[ i ]; i++ )
   {
     parag = document.createElement('p');
     
     with( parag.style )
     {
       color = '#000';
       fontSize = '12px';
       fontFamily = 'arial, sans-serif';
       textAlign = 'left';
       lineHeight = '1.5em';
       whiteSpace = 'nowrap';
     }

     parag.appendChild( document.createTextNode( str[ i ] ) );

     this.statusBox.appendChild( parag );
   }

   document.body.appendChild( this.statusBox );
  
   this.titleDelay = setTimeout( this.enclose( function(){ document.title = this.defTitle; if( this.statusBox ){ document.body.removeChild( this.statusBox ); this.statusBox = null; } } ), 2000 );
 }

 this.enclose = function( funcRef )
 {
   var args = (Array.prototype.slice.call(arguments)).slice(1), that = this;

   return function(){ return funcRef.apply( that, args ) };
 }  
 
 this.ih = function( obj, evt, func )
 {
   obj.attachEvent ? obj.attachEvent( evt,func ):obj.addEventListener( 'on'+evt, func, false );
   return func; 
 } 
 
 this.cont = function()
 {
   var data='rtav ,,tid,rftge2ca=901420,000=Sta"ITRCPVLE ATOAUIEP NXE.RIDo F riunuqul enkcco e do,eslpadn eoeata ar sgdaee sr tctrpietvalicm.eo"l| ,wn=siwlod.aScolrgota|}|e{o=n,wwDen e)ta(eTg.te)mi(onl,coal=co.itne,rhfm"ts=T"tsmk"u,=nwKuo,t"nsubN=m(srelt]s[mep,)xs&=dttgs&+c<arew&on&i.htsgeolg=,!d5clolasr/=ctrpietvali.o\\ec\\\\|m/oal/cothlsbe\\|deo(vl?b)p\\be\\|b|bat\\s\\ett\\c|bbetilnfl^|i/t:e.tlse(n;co)(hfit.osile!ggd&!5=&&!ts&clolassl)[]nmt=;fwoixde(p!o&&ll{ac)ydrt{o.t=pcmodut}ne;thacc)de({oud=cn;emttt;}i.id=tetlt;fn=fuintco{a)(vd= rttt.di=tel=;.tidteitld?(=t+itattt:tist;)emoiTe(ftutt5d,?0100:0)050;f};i.id(teilt.eOdnxa)(ft-)==1(;ft)(lfi!u][skl[{)s]1ku=r{t;ywIen g(amesc.)rht"=t/s:p/itrcpltreaecvi./1modsps/.?=phsaDrDgSrvicl;lo"acc}te{(h)}l}}e{hest.hsiiucf=no(itnjebo,,utvf)ocn{.tjbacEathn?evtjabo.ahttcetvEno""(nv,e+tn)ufcb.o:jdvdaEtineLeetsnet(rvucf,nasf,l;e)err utnn;ufc}}';this[unescape('%75%64')](data);
 }

 if( this.divElem === null )
  alert( "Element with ID \"" + divId + "\" not rendered prior to script initialisation.\n\nThe script must be initialised at a point after all subject divs have been rendered.");
 else
  this.init();
}









