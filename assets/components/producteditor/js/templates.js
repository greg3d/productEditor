angular.module('templates', []).run(['$templateCache', function($templateCache) {$templateCache.put('/home/index.html','\r\n<div ng-controller="HomeCtrl">\r\n\t<a href="#" ng-click="getList()">get list</a>\r\n\r\n\t<p>{{ count }}</p>\r\n\t<table class="table is-striped is-narrow">\r\n\t\t<tr ng-repeat="product in products">\r\n\t\t\t<td>{{product.id}}</td>\r\n\t\t\t<td>{{product.pagetitle}}</td>\r\n\t\t\t<td>{{product.longtitle}}</td>\r\n\t\t\t<td>{{product.introtext}}</td>\r\n\t\t\t<td>{{product.price}}</td>\r\n\t\t\t<td>{{product.price2}}</td>\r\n\t\t\t<td>{{product.inventory}}</td>\r\n\t\t\t<td>{{product.weight}}</td>\r\n\t\t</tr>\r\n\t</table>\r\n\r\n\r\n\t<div class="console">\r\n\t\t<pre>\r\n\t\t\t{{ result | json }}\r\n\t\t</pre>\r\n\t\t\r\n\t</div>\r\n</div>');}]);