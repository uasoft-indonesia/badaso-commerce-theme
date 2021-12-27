"use strict";(self.webpackChunkdoc=self.webpackChunkdoc||[]).push([[152],{3905:function(e,t,n){n.d(t,{Zo:function(){return m},kt:function(){return d}});var r=n(7294);function a(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function o(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function i(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?o(Object(n),!0).forEach((function(t){a(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):o(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function l(e,t){if(null==e)return{};var n,r,a=function(e,t){if(null==e)return{};var n,r,a={},o=Object.keys(e);for(r=0;r<o.length;r++)n=o[r],t.indexOf(n)>=0||(a[n]=e[n]);return a}(e,t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(r=0;r<o.length;r++)n=o[r],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(a[n]=e[n])}return a}var c=r.createContext({}),s=function(e){var t=r.useContext(c),n=t;return e&&(n="function"==typeof e?e(t):i(i({},t),e)),n},m=function(e){var t=s(e.components);return r.createElement(c.Provider,{value:t},e.children)},u={inlineCode:"code",wrapper:function(e){var t=e.children;return r.createElement(r.Fragment,{},t)}},p=r.forwardRef((function(e,t){var n=e.components,a=e.mdxType,o=e.originalType,c=e.parentName,m=l(e,["components","mdxType","originalType","parentName"]),p=s(n),d=a,f=p["".concat(c,".").concat(d)]||p[d]||u[d]||o;return n?r.createElement(f,i(i({ref:t},m),{},{components:n})):r.createElement(f,i({ref:t},m))}));function d(e,t){var n=arguments,a=t&&t.mdxType;if("string"==typeof e||a){var o=n.length,i=new Array(o);i[0]=p;var l={};for(var c in t)hasOwnProperty.call(t,c)&&(l[c]=t[c]);l.originalType=e,l.mdxType="string"==typeof e?e:a,i[1]=l;for(var s=2;s<o;s++)i[s]=n[s];return r.createElement.apply(null,i)}return r.createElement.apply(null,n)}p.displayName="MDXCreateElement"},681:function(e,t,n){n.r(t),n.d(t,{frontMatter:function(){return l},contentTitle:function(){return c},metadata:function(){return s},toc:function(){return m},default:function(){return p}});var r=n(7462),a=n(3366),o=(n(7294),n(3905)),i=["components"],l={sidebar_position:1},c="Installation",s={unversionedId:"getting-started/installation",id:"getting-started/installation",title:"Installation",description:"1. Install Badaso first with Badaso commerce module installed. After that, you can install the module with the following command.",source:"@site/docs/getting-started/installation.md",sourceDirName:"getting-started",slug:"/getting-started/installation",permalink:"/getting-started/installation",editUrl:"https://github.com/uasoft-indonesia/badaso-commerce-theme/edit/main/website/docs/getting-started/installation.md",tags:[],version:"current",sidebarPosition:1,frontMatter:{sidebar_position:1},sidebar:"tutorialSidebar",previous:{title:"Introduction",permalink:"/"}},m=[{value:"Acknowledgements",id:"acknowledgements",children:[],level:2}],u={toc:m};function p(e){var t=e.components,n=(0,a.Z)(e,i);return(0,o.kt)("wrapper",(0,r.Z)({},u,n,{components:t,mdxType:"MDXLayout"}),(0,o.kt)("h1",{id:"installation"},"Installation"),(0,o.kt)("ol",null,(0,o.kt)("li",{parentName:"ol"},"Install ",(0,o.kt)("a",{parentName:"li",href:"https://github.com/uasoft-indonesia/badaso"},"Badaso")," first with ",(0,o.kt)("a",{parentName:"li",href:"https://github.com/uasoft-indonesia/badaso-commerce-theme"},"Badaso commerce module")," installed. After that, you can install the module with the following command.")),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre",className:"language-bash"},"composer require badaso/commerce-theme\n")),(0,o.kt)("ol",{start:2},(0,o.kt)("li",{parentName:"ol"},"Run the following command to easily setup the theme.")),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre",className:"language-bash"},"php artisan migrate\nphp artisan badaso-commerce-theme:setup\ncomposer dump-autoload\nphp artisan db:seed --class=BadasoCommerceThemeSeeder\n")),(0,o.kt)("ol",{start:3},(0,o.kt)("li",{parentName:"ol"},"Add the plugins to your ",(0,o.kt)("inlineCode",{parentName:"li"},"MIX_BADASO_MODULES")," to ",(0,o.kt)("inlineCode",{parentName:"li"},".env"),". If you have another plugins installed, include them using delimiter comma (,).")),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre"},"MIX_BADASO_MODULES=commerce-theme\n")),(0,o.kt)("ol",{start:4},(0,o.kt)("li",{parentName:"ol"},"Add the plugins menu to your ",(0,o.kt)("inlineCode",{parentName:"li"},"MIX_BADASO_MENU")," to ",(0,o.kt)("inlineCode",{parentName:"li"},".env"),". If you have another menu, include them using delimiter comma (,).")),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre"},"MIX_BADASO_MENU=admin,commerce-theme\n")),(0,o.kt)("ol",{start:5},(0,o.kt)("li",{parentName:"ol"},"Fill the other variables in .env file.",(0,o.kt)("ul",{parentName:"li"},(0,o.kt)("li",{parentName:"ul"},(0,o.kt)("inlineCode",{parentName:"li"},"MIX_COMMERCE_WEB_ROUTE_PREFIX=commerce")," Set prefix for the theme."),(0,o.kt)("li",{parentName:"ul"},(0,o.kt)("inlineCode",{parentName:"li"},'CRON_EXPIRED_ORDER="*/5 * * * *"')," Set the cron job to check for expired orders.")))),(0,o.kt)("h2",{id:"acknowledgements"},"Acknowledgements"),(0,o.kt)("ul",null,(0,o.kt)("li",{parentName:"ul"},(0,o.kt)("a",{parentName:"li",href:"https://tailwindcss.com/"},"TailwindCSS")),(0,o.kt)("li",{parentName:"ul"},(0,o.kt)("a",{parentName:"li",href:"https://vocajs.com/"},"VocaJS"))))}p.isMDXComponent=!0}}]);