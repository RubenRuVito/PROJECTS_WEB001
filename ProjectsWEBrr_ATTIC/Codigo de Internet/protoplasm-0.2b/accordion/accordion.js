if(window.Control==undefined){Control={}}Control.Accordion=Class.create();Control.Accordion.prototype={initialize:function(a,b){this.container=$(a);this.lastExpandedTab=null;this.accordionTabs=new Array();this.setOptions(b);this._attachBehaviors();for(var c=1;c<this.accordionTabs.length;c++){this.accordionTabs[c].collapse();this.accordionTabs[c].content.style.display="none"}this.lastExpandedTab=this.accordionTabs[0];this.lastExpandedTab.content.style.height=this.options.panelHeight+"px";this.lastExpandedTab.showExpanded()},setOptions:function(a){this.options=Object.extend({panelHeight:200,onHideTab:null,onShowTab:null},a||{})},showTabByIndex:function(c,b){var a=arguments.length==1?true:b;this.showTab(this.accordionTabs[c],a)},showTab:function(f,d,e){var c=arguments.length==1?true:d;if(this.options.onHideTab){this.options.onHideTab(this.lastExpandedTab)}this.lastExpandedTab.showCollapsed();this.lastExpandedTab.content.style.height=(this.options.panelHeight-1)+"px";f.content.style.display="";var b=this;var a=this.lastExpandedTab;if(c){new Control.Accordion.Animation(this.lastExpandedTab.content,f.content,1,this.options.panelHeight,100,10,{complete:function(){b.showTabDone(a,e)}});this.lastExpandedTab=f}else{this.lastExpandedTab.content.style.height="1px";f.content.style.height=this.options.panelHeight+"px";this.lastExpandedTab=f;this.showTabDone(a)}},showTabDone:function(a,b){a.content.style.display="none";this.lastExpandedTab.showExpanded();if(!b&&this.options.onShowTab){this.options.onShowTab(this.lastExpandedTab)}},_attachBehaviors:function(){var a=this._getDirectChildrenByTag(this.container,"DIV");for(var b=0;b<a.length;b++){var e=this._getDirectChildrenByTag(a[b],"DIV");if(e.length!=2){continue}var c=e[0];var d=e[1];this.accordionTabs.push(new Control.Accordion.Tab(this,c,d))}},_getDirectChildrenByTag:function(f,d){var b=new Array();var a=f.childNodes;for(var c=0;c<a.length;c++){if(a[c]&&a[c].tagName&&a[c].tagName==d){b.push(a[c])}}return b}};Control.Accordion.Tab=Class.create();Control.Accordion.Tab.prototype={initialize:function(a,b,c){this.accordion=a;this.titleBar=b;this.content=c;this._attachBehaviors()},collapse:function(){this.showCollapsed();this.content.style.height="1px"},showCollapsed:function(){this.expanded=false;if(this.accordion.options.collapsedClass){this.titleBar.className=this.accordion.options.collapsedClass}this.content.style.overflow="hidden"},showExpanded:function(){this.expanded=true;if(this.accordion.options.expandedClass){this.titleBar.className=this.accordion.options.expandedClass}this.content.style.overflow="visible"},titleBarClicked:function(a){if(this.accordion.lastExpandedTab!=this){this.accordion.showTab(this)}},hover:function(a){if(!this.expanded&&this.accordion.options.hoverClass){this.titleBar.className=this.accordion.options.hoverClass}},unhover:function(a){if(this.expanded){if(this.accordion.options.expandedClass){this.titleBar.className=this.accordion.options.expandedClass}}else{if(this.accordion.options.collapsedClass){this.titleBar.className=this.accordion.options.collapsedClass}}},_attachBehaviors:function(){this.titleBar.onclick=this.titleBarClicked.bindAsEventListener(this);this.titleBar.onmouseover=this.hover.bindAsEventListener(this);this.titleBar.onmouseout=this.unhover.bindAsEventListener(this)}};Control.Accordion.Animation=Class.create({initialize:function(f,e,g,a,d,b,c){this.e1=$(f);this.e2=$(e);this.start=g;this.end=a;this.duration=d;this.steps=b;this.options=arguments[6]||{};this.accordionSize()},accordionSize:function(){if(this.isFinished()){this.e1.style.height=this.start+"px";this.e2.style.height=this.end+"px";if(this.options.complete){this.options.complete(this)}return}if(this.timer){clearTimeout(this.timer)}var a=Math.round(this.duration/this.steps);var b=this.steps>0?(parseInt(this.e1.offsetHeight)-this.start)/this.steps:0;this.resizeBy(b);this.duration-=a;this.steps--;this.timer=setTimeout(this.accordionSize.bind(this),a)},isFinished:function(){return this.steps<=0},resizeBy:function(b){var d=this.e1.offsetHeight;var a=this.e2.offsetHeight;var c=parseInt(b);if(b!=0){this.e1.style.height=(d-c)+"px";this.e2.style.height=(a+c)+"px"}}});if(typeof Protoplasm!="undefined"){Protoplasm.register("accordion",Control.Accordion)};