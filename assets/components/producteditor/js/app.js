!function(){"use strict";t.$inject=["$stateProvider","$urlRouterProvider","$httpProvider"],e.$inject=["Config"];var r=[function(e){var l=function(e){var t,n,r,o,i,u,c="";for(t in e)if((n=e[t])instanceof Array)for(u=0;u<n.length;++u)o=n[u],(i={})[t+"["+u+"]"]=o,c+=l(i)+"&";else if(n instanceof Object)for(r in n)o=n[r],(i={})[t+"["+r+"]"]=o,c+=l(i)+"&";else null!=n&&(c+=encodeURIComponent(t)+"="+encodeURIComponent(n)+"&");return c.length?c.substr(0,c.length-1):c};return angular.isObject(e)&&"[object File]"!==String(e)?l(e):e}];function e(r){this.Request=function(e,t){var n={HTTP_MODAUTH:pe_config.auth_token,action:e};return null!==t&&(n.data=t),$http.post(r.connector_url,n)}}function t(e,t,n){e.state({name:"home",url:"/",templateUrl:"/home/index.html",controller:"HomeCtrl",controllerAs:"hc"}),e.state({name:"about",url:"/about",template:"<h3>about</h3>"}),t.otherwise("/"),n.defaults.headers.post["Content-Type"]="application/x-www-form-urlencoded;charset=utf-8",n.defaults.transformRequest=r}angular.module("manager",["ui.router","home","templates"]).config(t).run(function(){}).controller("MainCtrl",function(){}).filter("renderFieldValue",function(){return function(e){return e}}).service("Config",function(){this.connector_url=pe_config.assets_url+"components/producteditor/connector.php"}).service("Server",e)}();
!function(){"use strict";function e(a,u,e,m){var c=this;c.result="",c.products=[],c.count=0;var t;c.gridOptions={enableSorting:!0,columnDefs:[{name:"id",field:"id",displayName:"",enableCellEdit:!1,width:40,headerCellTemplate:"/home/headers/id.html"},{name:"название",field:"pagetitle"},{name:"аннотация",field:"introtext"},{name:"алиас",field:"alias"},{name:"Тип",field:"type",editableCellTemplate:"ui-grid/dropdownEditor",editDropdownValueLabel:"id",editDropdownOptionsArray:[{id:"эко-грунт"},{id:"концентрат"},{id:"жидкий"},{id:"гумат"},{id:"черви"}]},{name:"Цена Самара",field:"price_action",cellFilter:"numFormat"},{name:"Цена Регионы",field:"price",cellFilter:"numFormat"},{name:"Цена Сибирь",field:"price_dv",cellFilter:"numFormat"},{name:"Объем, л",field:"weight",width:64,cellFilter:"numFormat"},{name:"Вес, кг",field:"inventory",width:64,cellFilter:"numFormat"}],data:"hc.products"},c.msg={},c.gridOptions.onRegisterApi=function(e){(c.gridApi=e).edit.on.afterCellEdit(a,function(e,t,i,n){var o,l,r,d;c.msg.lastCellEdited="edited row id:"+e.id+" Column:"+t.name+" newValue:"+i+" oldValue:"+n,o=e.id,l=t.field,r=i,d={HTTP_MODAUTH:pe_config.auth_token,action:"mgr/item/update",id:o,key:l,value:r},u.post(m.connector_url,d).then(function(e){c.msg.updateResponse=e},function(e){c.msg.updateResponse=e}),a.$apply()})},t={HTTP_MODAUTH:pe_config.auth_token,action:"mgr/item/getproductslist"},u.post(m.connector_url,t).then(function(e){c.count=e.data.total,c.products=e.data.object,c.result=e},function(e){c.result=e})}e.$inject=["$scope","$http","$rootScope","Config"],angular.module("home",["ui.router","ui.grid","ui.grid.edit"]).controller("HomeCtrl",e).config(function(){}).filter("numFormat",function(){return function(e){return new Intl.NumberFormat("ru-RU").format(e)}})}();