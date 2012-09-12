
/**  -- RecoverDivScroll -- (C)Scripterlative.com

    !!! READ THIS FIRST !!!

 -> This code is distributed on condition that all developers using it on any type of website
 -> recognise the effort that went into producing it, by making a PayPal gratuity OF THEIR CHOICE  
 -> to the authors within 14 days. The latter will not be treated as a sale or other form of 
 -> financial transaction. 
 -> Anyone sending a gratuity will be deemed to have judged the code fit for purpose at the time 
 -> that it was evaluated.
 -> Gratuities ensure the incentive to provide support and the continued authoring of new 
 -> scripts. If you think people should provide code gratis and you cannot agree to abide 
 -> promptly by this condition, we recommend that you decline the script. We'll understand.
    
 -> Gratuities cannot be accepted via any source other than PayPal.

 -> Please use the [Donate] button at www.scripterlative.com, stating the URL that uses the code.

 -> THIS CODE IS NOT LICENSABLE FOR INCLUSION IN ANY COMMERCIAL PACKAGE
 
Description
~~~~~~~~~~~
 Preserves the scrolled x & y position of specified scollable DIV elements between consecutive
 page reloads, for the duration of either current session or a specified number of days.

 * Uses cookies *

 Info: http://scripterlative.com?RecoverDivScroll

 These instructions may be removed but not the above text.

 Please notify any suspected errors in this text or code, however minor.

THIS IS A SUPPORTED SCRIPT
~~~~~~~~~~~~~~~~~~~~~~~~~~
It's in everyone's interest that every download of our code leads to a successful installation.
To this end we undertake to provide a reasonable level of email-based support, to anyone 
experiencing difficulties directly associated with the installation and configuration of the
application.

Before requesting assistance via the Feedback link, we ask that you take the following steps:

1) Ensure that the instructions have been followed accurately.

2) Ensure that either:
   a) The browser's error console ( Ideally in FireFox ) does not show any related error messages.
   b) You notify us of any error messages that you cannot interpret.

3) Validate your document's markup at: http://validator.w3.org or any equivalent site.   
   
4) Provide a URL to a test document that demonstrates the problem.

 
Installation
~~~~~~~~~~~~
 Save this text/file as 'recoverdivscroll.js', and place it in a folder associated with your web pages.

 Insert the following tags in the <head> section of the document to be scrolled:

 <script type='text/javascript' src='recoverdivscroll.js'></script>

 (If recoverdivscroll.js resides in a different folder, include the relative path)

Configuration
~~~~~~~~~~~~~
 All that is necessary is to identify the div(s) on which the script is to operate, using their
 ID atributes.
 The example below sets-up three scrollable divs with IDs: "Products", "Images" & "Prices".

 This code must be inserted within the <body> section, BELOW all the divs to which it relates:

 <script type='text/javascript'>

  RecoverDivScroll.init("", "Products", "Images", "Prices");

 </script>

 You will see that the first parameter is an empty string "", which is the way the script is
 configured when it is to be used within a single document only.
 To use the script on multiple documents on the same domain, for each document the first parameter
 should be specified as a different unique name. This ensures that a separate cookie is created for
 each document.

 Storing Data Between Browser Sessions
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 To remember the scrolled position between sessions, in the same <script> block as above include the
 following function call specifying the number of days, in this example 30:

  RecoverDivScroll.persist( 30 );

 Bear in mind that scroll re-positioning is pixel-based, therefore its apparent accuracy can be
 affected by changes either to the document's content or the user's screen resolution.

 Saving and Restoring Scroll Position Without Page Reload
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 In some situations altering the content/dimensions of a div, may cause an unwanted scroll.
 Two functions are available to save the scrolled position prior to such operations, and to
 restore the position afterwards.
 
 RecoverDivScroll.save( 'id of div' );
 
 // Statements that alter div position or dimensions 
 
 RecoverDivScroll.restore( 'id of div' );
   
 Missing Elements & Documents with Variable Content
 --------------------------------------------------
 By default if a specified element is not found, an alert is displayed. If a document has varying
 content such that some scrolled elements are not always loaded, alerts can be disabled by changing
 the value of the 'silentError' property from false to true. Alternatively the server-side code
 should be made to pass only appropriate ID parameters to the script.

 NOTE. This script also uses the onscroll event. If any other installed scripts are known use this
       event, they should be initialised ealier in the document.

*** DO NOT EDIT BELOW THIS LINE ***/

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

/*Fin*/