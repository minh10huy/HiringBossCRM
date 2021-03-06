/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add("datasource-cache",function(C){var B=function(){};C.mix(B,{NS:"cache",NAME:"dataSourceCacheExtension"});B.prototype={initializer:function(D){this.doBefore("_defRequestFn",this._beforeDefRequestFn);this.doBefore("_defResponseFn",this._beforeDefResponseFn);},_beforeDefRequestFn:function(E){var D=(this.retrieve(E.request))||null;if(D&&D.response){this.get("host").fire("response",C.mix(D,E));return new C.Do.Halt("DataSourceCache extension halted _defRequestFn");}},_beforeDefResponseFn:function(D){if(D.response&&!D.cached){this.add(D.request,D.response);}}};C.namespace("Plugin").DataSourceCacheExtension=B;function A(F){var E=F&&F.cache?F.cache:C.Cache,G=C.Base.create("dataSourceCache",E,[C.Plugin.Base,C.Plugin.DataSourceCacheExtension]),D=new G(F);G.NS="tmpClass";return D;}C.mix(A,{NS:"cache",NAME:"dataSourceCache"});C.namespace("Plugin").DataSourceCache=A;},"3.3.0",{requires:["datasource-local","cache-base"]});
