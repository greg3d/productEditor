productEditor.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'producteditor-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: false,
            hideMode: 'offsets',
            items: [{
                title: _('producteditor_items'),
                layout: 'anchor',
                items: [{
                    html: _('producteditor_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'producteditor-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    productEditor.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(productEditor.panel.Home, MODx.Panel);
Ext.reg('producteditor-panel-home', productEditor.panel.Home);