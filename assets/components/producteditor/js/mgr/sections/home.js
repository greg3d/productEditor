productEditor.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'producteditor-panel-home',
            renderTo: 'producteditor-panel-home-div'
        }]
    });
    productEditor.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(productEditor.page.Home, MODx.Component);
Ext.reg('producteditor-page-home', productEditor.page.Home);