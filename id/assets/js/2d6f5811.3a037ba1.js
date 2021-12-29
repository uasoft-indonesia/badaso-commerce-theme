"use strict";(self.webpackChunkdoc=self.webpackChunkdoc||[]).push([[461],{3905:function(e,t,r){r.d(t,{Zo:function(){return u},kt:function(){return d}});var n=r(7294);function o(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function i(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function a(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?i(Object(r),!0).forEach((function(t){o(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):i(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function c(e,t){if(null==e)return{};var r,n,o=function(e,t){if(null==e)return{};var r,n,o={},i=Object.keys(e);for(n=0;n<i.length;n++)r=i[n],t.indexOf(r)>=0||(o[r]=e[r]);return o}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(n=0;n<i.length;n++)r=i[n],t.indexOf(r)>=0||Object.prototype.propertyIsEnumerable.call(e,r)&&(o[r]=e[r])}return o}var l=n.createContext({}),p=function(e){var t=n.useContext(l),r=t;return e&&(r="function"==typeof e?e(t):a(a({},t),e)),r},u=function(e){var t=p(e.components);return n.createElement(l.Provider,{value:t},e.children)},m={inlineCode:"code",wrapper:function(e){var t=e.children;return n.createElement(n.Fragment,{},t)}},s=n.forwardRef((function(e,t){var r=e.components,o=e.mdxType,i=e.originalType,l=e.parentName,u=c(e,["components","mdxType","originalType","parentName"]),s=p(r),d=o,f=s["".concat(l,".").concat(d)]||s[d]||m[d]||i;return r?n.createElement(f,a(a({ref:t},u),{},{components:r})):n.createElement(f,a({ref:t},u))}));function d(e,t){var r=arguments,o=t&&t.mdxType;if("string"==typeof e||o){var i=r.length,a=new Array(i);a[0]=s;var c={};for(var l in t)hasOwnProperty.call(t,l)&&(c[l]=t[l]);c.originalType=e,c.mdxType="string"==typeof e?e:o,a[1]=c;for(var p=2;p<i;p++)a[p]=r[p];return n.createElement.apply(null,a)}return n.createElement.apply(null,r)}s.displayName="MDXCreateElement"},8526:function(e,t,r){r.r(t),r.d(t,{frontMatter:function(){return c},contentTitle:function(){return l},metadata:function(){return p},toc:function(){return u},default:function(){return s}});var n=r(7462),o=r(3366),i=(r(7294),r(3905)),a=["components"],c={sidebar_position:2},l="Override View",p={unversionedId:"customization/override-view",id:"customization/override-view",title:"Override View",description:"To override the view, you can follow the following steps:",source:"@site/docs/customization/override-view.md",sourceDirName:"customization",slug:"/customization/override-view",permalink:"/id/customization/override-view",editUrl:"https://github.com/uasoft-indonesia/badaso-commerce-theme/edit/main/website/docs/customization/override-view.md",tags:[],version:"current",sidebarPosition:2,frontMatter:{sidebar_position:2},sidebar:"tutorialSidebar",previous:{title:"Override Controller",permalink:"/id/customization/override-controller"}},u=[],m={toc:u};function s(e){var t=e.components,r=(0,o.Z)(e,a);return(0,i.kt)("wrapper",(0,n.Z)({},m,r,{components:t,mdxType:"MDXLayout"}),(0,i.kt)("h1",{id:"override-view"},"Override View"),(0,i.kt)("p",null,"To override the view, you can follow the following steps:"),(0,i.kt)("ul",null,(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("p",{parentName:"li"},"You must run the theme setup first by running the ",(0,i.kt)("inlineCode",{parentName:"p"},"php artisan badaso-commerce-theme:setup")," command.")),(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("p",{parentName:"li"},"A folder named ",(0,i.kt)("inlineCode",{parentName:"p"},"commerce-theme")," will be created in the ",(0,i.kt)("inlineCode",{parentName:"p"},"resources/js/badaso/theme")," folder.")),(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("p",{parentName:"li"},"Inside the ",(0,i.kt)("inlineCode",{parentName:"p"},"commerce-theme")," folder, there will be a folder named ",(0,i.kt)("inlineCode",{parentName:"p"},"pages"),". Create a .vue file inside the ",(0,i.kt)("inlineCode",{parentName:"p"},"pages")," folder with the same name as the page. For example, if you want to override the ",(0,i.kt)("inlineCode",{parentName:"p"},"home")," page, you can create a ",(0,i.kt)("inlineCode",{parentName:"p"},"home.vue")," file in the ",(0,i.kt)("inlineCode",{parentName:"p"},"pages")," folder.")),(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("p",{parentName:"li"},"You can see the available page that can be overridden in the ",(0,i.kt)("inlineCode",{parentName:"p"},"vendor/badaso/commerce-theme/src/resources/app/pages/")," file."))))}s.isMDXComponent=!0}}]);