"use strict";(self.__LOADABLE_LOADED_CHUNKS__=self.__LOADABLE_LOADED_CHUNKS__||[]).push([[168],{720687:(e,t,n)=>{n.d(t,{default:()=>r});var a=n(934980);let i=`pulsing {
  0% {
    opacity: 1;
  }

  50% {
    opacity: 0.4;
  }

  100% {
    opacity: 1;
  }
}`,r={css:(0,a.Ll)([i]),animation:"pulsing 2s infinite"}},503546:(e,t,n)=>{n.d(t,{Z:()=>c});var a=n(667294),i=n(616550),r=n(282999),o=n(297728),l=n(730212),s=n(383399),u=n(402189),m=n(862014),p=n(984821);function c(){let e=(0,s.Z)(),t=(0,o.F)(),{isRTL:n}=(0,l.B)(),c=(0,i.TH)(),d=(0,i.k6)(),h=c.search,b=(0,p.Z)(c)&&!n&&e.isAuth&&!e.isPartner&&!(0,r.OK)(c);return(0,a.useEffect)(()=>{h.includes("enable_vertical_nav")&&((0,m.M)(),d.push("/"),window.location.reload())},[h,d]),{enabled:b&&t.checkExperiment("web_vertical_nav").anyEnabled,group:b?t.checkExperiment("web_vertical_nav").group:u.lR.NONE}}},717307:(e,t,n)=>{n.d(t,{Z:()=>l});var a=n(297728),i=n(2968),r=n(730212),o=n(410150);function l(){let{isAuthenticated:e}=(0,r.B)(),t=(0,o.HG)(),{checkExperiment:n}=(0,a.F)(),l=e&&t&&n("dweb_grid_loading_state").group||"control";return{isInGridLoadingStateExp:(0,i.Z)(l),isInGridLoadingStateDefaultExp:"enabled"===l,isInGridInfiniteScrollExp:"enabled_infinite_scroll"===l||"employees"===l}}},31723:(e,t,n)=>{n.r(t),n.d(t,{default:()=>R});var a=n(667294),i=n(883119),r=n(573706),o=n(986782);function l(e,t,n){var a;return(t="symbol"==typeof(a=function(e,t){if("object"!=typeof e||!e)return e;var n=e[Symbol.toPrimitive];if(void 0!==n){var a=n.call(e,t||"default");if("object"!=typeof a)return a;throw TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(t,"string"))?a:a+"")in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}let s={},u=e=>{let t=e.__id||e.id;return"string"==typeof t&&t||null};class m{constructor(){l(this,"idMap",new Map),l(this,"objMap",new WeakMap)}get(e){let t=u(e);return this.objMap.get(e)??(t?this.idMap.get(t):void 0)}has(e){let t=u(e);return this.objMap.has(e)??(!!t&&this.idMap.has(t))}set(e,t){let n=u(e);n&&this.idMap.set(n,t),this.objMap.set(e,t)}reset(){this.idMap=new Map,this.objMap=new WeakMap}}var p=n(587435),c=n(39260),d=n(717307),h=n(876594),b=n(720687),f=n(512541),y=n(785893);let{css:_,animation:w}=b.default,g={backgroundColor:h._VP,animation:w,borderRadius:h.Ev2};function x({data:e}){let{height:t}=e;return(0,y.jsxs)(a.Fragment,{children:[(0,y.jsx)(f.Z,{unsafeCSS:_}),(0,y.jsx)(i.xu,{dangerouslySetInlineStyle:{__style:g},"data-test-id":"skeleton-pin",children:(0,y.jsx)(i.xu,{height:t})})]})}var v=n(679482),E=n(297728),C=n(730212),k=n(410150),M=n(415787),S=n(855746);function $({analyticsData:e,children:t,idx:n,isMeasuring:i,masonryV2ExpName:r,masonryV2ExpGroup:l}){let s=(0,k.ZP)(),{isAuthenticated:u}=(0,C.B)(),m=(0,S.MM)();return(0,a.useEffect)(()=>{if(e.current[n]){let{fetchTimestamp:t,measureTimestamp:a,hasRendered:o,pageCount:p}=e.current[n]??{},c={deviceType:s,experimentName:r,experimentGroup:l,handlerId:m,isAuthenticated:u,pageCount:p};i&&!a&&(e.current[n].measureTimestamp=Date.now(),(0,M.LY)("webapp.masonry.itemMeasureStart",Date.now()-t,{tags:c})),i||o||((0,M.LY)("webapp.masonry.itemRenderStart",Date.now()-a,{tags:c}),e.current[n].hasRendered=!0)}},[i]),(0,y.jsx)(o.Z,{name:"MasonryItem",children:t})}function R(e){let{align:t,cacheKey:n,id:l,isFetching:u,isGridCentered:h=!0,items:b,layout:_,loadItems:w,masonryRef:g,optOutFluidGridExperiment:R=!1,renderItem:O,scrollContainerRef:G,virtualize:N=!0,_getColumnSpanConfig:I,_dynamicHeights:j,useLoadingState:T}=e,W=(0,k.ZP)(),{isAuthenticated:L,isRTL:A}=(0,C.B)(),{logContextEvent:D}=(0,r.v)(),Z=(0,E.F)(),B="desktop"===W,P=(0,S.MM)(),H=(0,a.useRef)(b.map(()=>({fetchTimestamp:Date.now(),measureTimestamp:Date.now(),hasRendered:!1,pageCount:0}))),{experimentalColumnWidth:V,experimentalGutter:F,anyEnabled:z,group:Y}=(0,p.Z)("flexible"!==_&&!R),U=e.serverRender??!!B,J="flexible"===_||"uniformRowFlexible"===_||"desktop"!==W||z,K=(J&&_?.startsWith("uniformRow")?"uniformRowFlexible":void 0)??(U?"serverRenderedFlexible":"flexible"),X=e.columnWidth??V??v.yF;J&&(X=Math.floor(X));let q=e.gutterWidth??F??(B?v.oX:1),Q=e.minCols??v.yc,ee=(0,a.useRef)(0),et=X+q,en=function(e){if(null==e)return;let t=function(e){let t=s[e];return t&&t.screenWidth===window.innerWidth||(s[e]={screenWidth:window.innerWidth}),s[e]}(e);return t.measurementCache||(t.measurementCache=new m),t.measurementCache}(n),ea=(0,a.useCallback)(()=>G?.current||window,[G]),ei=(0,a.useRef)(!0),{anyEnabled:er,group:eo}=I?Z.checkExperiment("web_masonry_mixed_early_bailout"):{anyEnabled:!1,group:""},el=er?e=>e<=3?2*q:3*q:void 0,{anyEnabled:es}=j?Z.checkExperiment("dynamic_heights_v2"):{anyEnabled:!1},eu=h&&ei.current?"centered":"",{className:em,styles:ep}=function(e){let t=`m_${Object.keys(e).sort().reduce((t,n)=>{let a=e[n];return null==a||"object"==typeof a||"function"==typeof a?t:"boolean"==typeof a?t+(a?"t":"f"):t+a},"").replace(/\:/g,"\\:")}`,{flexible:n,gutterWidth:a,isRTL:i,itemWidth:r,maxColumns:o,minColumns:l,items:s,_getColumnSpanConfig:u}=e,m=u?s.map((e,t)=>({index:t,columnSpanConfig:u(e)??1})).filter(e=>1!==e.columnSpanConfig):[],p=r+a,c=Array.from({length:o+1-l},(e,t)=>t+l).map(e=>{let s=e===l?0:e*p,u=e===o?null:(e+1)*p-.01,{styles:c,numberOfVisibleItems:d}=m.reduce((i,o)=>{let{columnSpanConfig:l}=o,s=Math.min(function({columnCount:e,columnSpanConfig:t}){return"number"==typeof t?t:t[e<=2?"sm":e<=4?"md":e<=8?"lg":"xl"]??1}({columnCount:e,columnSpanConfig:l}),e),u=null!=o.index&&i.numberOfVisibleItems>=s+o.index,m=n?100/e*s:r*s+a*(s-1),{numberOfVisibleItems:p}=i;return u?p-=s-1:o.index<p&&(p+=1),{styles:i.styles.concat(function({className:e,index:t,columnSpanConfig:n,visible:a,width:i,flexible:r}){let o="number"==typeof n?n:btoa(JSON.stringify(n));return r?`
      .${e} .static[data-column-span="${o}"]:nth-child(${t+1}) {
        visibility: ${a?"visible":"hidden"} !important;
        position: ${a?"inherit":"absolute"} !important;
        width: ${i}% !important;
      }`:`
      .${e} .static[data-column-span="${o}"]:nth-child(${t+1}) {
        visibility: ${a?"visible":"hidden"} !important;
        position: ${a?"inherit":"absolute"} !important;
        width: ${i}px !important;
      }`}({className:t,index:o.index,columnSpanConfig:l,visible:u,width:m,flexible:n})),numberOfVisibleItems:p}},{styles:"",numberOfVisibleItems:e}),h=n?`
      .${t} .static {
        box-sizing: border-box;
        width: calc(100% / ${e}) !important;
      }
    `:`
      .${t} {
        max-width: ${e*p}px;
      }

      .${t} .static {
        width: ${r}px !important;
      }
    `;return{minWidth:s,maxWidth:u,styles:`
      .${t} .static:nth-child(-n+${d}) {
        position: static !important;
        visibility: visible !important;
        float: ${i?"right":"left"};
        display: block;
      }

      .${t} .static {
        padding: 0 ${a/2}px;
      }

      ${h}

      ${c}
    `}}),d=c.map(({minWidth:e,maxWidth:t,styles:n})=>`
    @container (min-width: ${e}px) ${t?`and (max-width: ${t}px)`:""} {
      ${n}
    }
  `),h=c.map(({minWidth:e,maxWidth:t,styles:n})=>`
    @media (min-width: ${e}px) ${t?`and (max-width: ${t}px)`:""} {
      ${n}
    }
  `),b=`
    ${d.join("")}
    @supports not (container-type: inline-size) {
      ${h.join("")}
    }
  `;return{className:t,styles:`
  .masonryContainer {
      container-type: inline-size;
    }

    .masonryContainer > .centered {
      margin-left: auto;
      margin-right: auto;
    }

    .${t} .static {
      position: absolute !important;
      visibility: hidden !important;
    }

    ${b}
  `}}({gutterWidth:q,flexible:J,items:b,isRTL:A,itemWidth:X,maxColumns:e.maxColumns??Math.max(b.length,v.g5),minColumns:Q,_getColumnSpanConfig:I}),ec=`${eu} ${em}`.trim(),{anyEnabled:ed,expName:eh,group:eb,isMeasureAllEnabled:ef}=(0,c.Z)(),ey=(0,a.useMemo)(()=>!en||b.every(e=>!en.has(e)),[]),e_=eb&&ey,ew=(0,a.useRef)(),eg=(0,a.useRef)(b.length),ex=(0,a.useRef)(0);(0,a.useEffect)(()=>{e_&&b.forEach((e,t)=>{H.current[t]||(H.current[t]={fetchTimestamp:Date.now(),measureTimestamp:0,hasRendered:!1,pageCount:ex.current})}),eg.current=b.length,ex.current+=1},[b]),(0,a.useEffect)(()=>{ei.current&&(ei.current=!1)},[]),(0,a.useEffect)(()=>{let e=()=>ee.current+=1;return e_&&(ew.current=Date.now(),window.addEventListener("scroll",e)),()=>{if(e_){let t=H.current;window.removeEventListener("scroll",e);let n=t.filter(e=>!!e.measureTimestamp).length,a=t.filter(e=>e.hasRendered).length,i=eg.current,r={deviceType:W,experimentName:eh,experimentGroup:eb,handlerId:P,isAuthenticated:L};(0,M.LY)("webapp.masonry.timeSpent",ew.current?Date.now()-ew.current:0,{tags:r}),(0,M.S0)("webapp.masonry.itemsFetched",i,{tags:r}),(0,M.S0)("webapp.masonry.itemsMeasured",n,{tags:r}),(0,M.S0)("webapp.masonry.itemsMeasuredPercentage",Math.floor(n/i*100),{tags:r}),(0,M.S0)("webapp.masonry.itemsRendered",a,{tags:r}),(0,M.S0)("webapp.masonry.itemsRenderedPercentage",Math.floor(a/i*100),{tags:r}),(0,M.S0)("webapp.masonry.scrollCount",ee.current,{tags:r})}}},[]);let ev=(0,a.useCallback)((e,t,n)=>{let a=e.reduce((e,t)=>e+t),i=a/e.length;(0,M.S0)("webapp.masonry.multiColumnWhitespace.average",i,{sampleRate:1,tags:{earlyBailoutExperimentGroup:eo||"unknown",experimentalMasonryGroup:eb||"unknown",fluidGridGroup:Y||"unknown",handlerId:P,isAuthenticated:L,multiColumnItemSpan:e.length}}),(0,M.S0)("webapp.masonry.twoColWhitespace",i,{sampleRate:1,tags:{columnWidth:X,minCols:Q}}),eo&&(0,M.S0)("webapp.masonry.graphIterations",t,{sampleRate:1,tags:{columnSpan:n,exprimentGroup:eo}}),D({event_type:15878,component:14468,aux_data:{total_whitespace_px:a}}),D({event_type:16062,component:14468,aux_data:{average_whitespace_px:i}}),D({event_type:16063,component:14468,aux_data:{max_whitespace_px:Math.max(...e)}}),e.forEach(t=>{t>=50&&((0,M.nP)("webapp.masonry.multiColumnWhitespace.over50",{sampleRate:1,tags:{earlyBailoutExperimentGroup:eo||"unknown",experimentalMasonryGroup:eb||"unknown",fluidGridGroup:Y||"unknown",handlerId:P,isAuthenticated:L,multiColumnItemSpan:e.length}}),D({event_type:16261,component:14468})),t>=100&&((0,M.nP)("webapp.masonry.multiColumnWhitespace.over100",{sampleRate:1,tags:{earlyBailoutExperimentGroup:eo||"unknown",experimentalMasonryGroup:eb||"unknown",fluidGridGroup:Y||"unknown",handlerId:P,isAuthenticated:L,multiColumnItemSpan:e.length}}),D({event_type:16262,component:14468}))}),(0,M.nP)("webapp.masonry.multiColumnWhitespace.count",{sampleRate:1,tags:{earlyBailoutExperimentGroup:eo||"unknown",experimentalMasonryGroup:eb||"unknown",fluidGridGroup:Y||"unknown",handlerId:P,isAuthenticated:L,multiColumnItemSpan:e.length}})},[X,eo,D,Q,L,P,Y,eb]),{_items:eE,_renderItem:eC}=function({initialLoadingStatePinCount:e=50,infiniteScrollPinCount:t=10,isFetching:n,items:i=[],renderItem:r,useLoadingState:o}){let{isInGridInfiniteScrollExp:l}=(0,d.Z)(),s=o&&n&&0===i.length,u=o&&n&&l&&i.length>0,m=(0,a.useMemo)(()=>Array.from({length:u?t:e}).reduce((e,t,n)=>[...e,{height:n%2==0?356:236,key:`skeleton-pin-${n}`,isSkeleton:!0}],[]),[e,t,u]);return{_items:(0,a.useMemo)(()=>s?m:u?[...i,...m]:i,[s,u,i,m]),_renderItem:(0,a.useMemo)(()=>o?e=>{let{itemIdx:t,data:n}=e;return t>=i.length&&n&&"object"==typeof n&&"key"in n&&"height"in n?(0,y.jsx)(x,{data:n},n.key):r(e)}:r,[o,r,i.length])}}({useLoadingState:T,items:b,renderItem:(0,a.useCallback)(e=>e_?(0,y.jsx)($,{analyticsData:H,idx:e.itemIdx,isMeasuring:e.isMeasuring,masonryV2ExpGroup:eb,masonryV2ExpName:eh,children:(0,y.jsx)(o.Z,{name:"MasonryItem",children:O(e)})}):(0,y.jsx)(o.Z,{name:"MasonryItem",children:O(e)}),[O]),isFetching:u});return(0,y.jsx)("div",{className:"masonryContainer","data-test-id":"masonry-container",id:l,style:z?{padding:`0 ${q/2}px`}:void 0,children:(0,y.jsxs)("div",{className:ec,children:[U&&ei.current?(0,y.jsx)(f.Z,{"data-test-id":"masonry-ssr-styles",unsafeCSS:ep}):null,(0,y.jsx)(i.xu,{"data-test-id":"max-width-container",marginBottom:0,marginEnd:"auto",marginStart:"auto",marginTop:0,maxWidth:e.maxColumns?et*e.maxColumns:void 0,children:ed?(0,y.jsx)(i.GX,{ref:e=>{g&&(g.current=e)},_dynamicHeights:j,_dynamicHeightsV2Experiment:es,_earlyBailout:el,_getColumnSpanConfig:I,_logTwoColWhitespace:ev,_measureAll:ef,align:t,columnWidth:X,gutterWidth:q,items:eE,layout:J?K:_??"basic",loadItems:w,measurementStore:en,minCols:Q,renderItem:eC,scrollContainer:ea,virtualBufferFactor:.3,virtualize:N}):(0,y.jsx)(i.Rk,{ref:e=>{g&&(g.current=e)},_dynamicHeights:j,_dynamicHeightsV2Experiment:es,_earlyBailout:el,_getColumnSpanConfig:I,_logTwoColWhitespace:ev,align:t,columnWidth:X,gutterWidth:q,items:eE,layout:J?K:_??"basic",loadItems:w,measurementStore:en,minCols:Q,renderItem:eC,scrollContainer:ea,virtualBufferFactor:.3,virtualize:N})})]})})}},587435:(e,t,n)=>{n.d(t,{Z:()=>s});var a=n(503546),i=n(297728),r=n(730212),o=n(410150);let l=({isEligible:e=!0,skipActivation:t,skipVerticalNavCheck:n})=>{let l=(0,o.ZP)(),{isAuthenticated:s}=(0,r.B)(),u=(0,i.F)(),{enabled:m}=(0,a.Z)();return"desktop"===l&&e?m&&!n?{anyEnabled:!0,group:"enabled_221_16"}:u.checkExperiment(s?"web_fluid_grid_desktop_auth":"web_fluid_grid_desktop_unauth",{dangerouslySkipActivation:t||!1}):{group:"",anyEnabled:!1}};function s(e=!0){let{group:t,anyEnabled:n}=l({isEligible:e}),a=t.match(/enabled_([\d]+)_([\d]+)/),i=a?parseInt(a[1],10):void 0,r=a?parseInt(a[2],10):void 0,o=r?Math.floor(r/4):void 0;return{anyEnabled:n,group:t,experimentalColumnWidth:i,experimentalGutter:r,experimentalGutterBoints:o}}},402189:(e,t,n)=>{n.d(t,{BO:()=>v,GC:()=>S,GJ:()=>f,L7:()=>h,Lc:()=>p,Mh:()=>u,Qf:()=>m,Qq:()=>M,Un:()=>R,X$:()=>k,Z7:()=>d,ZG:()=>$,bT:()=>w,bd:()=>_,df:()=>c,iz:()=>G,kl:()=>y,lR:()=>O,m6:()=>E,mT:()=>x,pS:()=>g,uW:()=>C,zz:()=>b});var a,i,r=n(883119),o=n(876594),l=n(65967),s=n(241716);let u="right",m=72,p="VerticalNavContent",c=24,d="lg",h=16,b=16,f=392,y=12,_=o.mJW,w=o.Kuk,g=new r.H3([s.NW]),x=new r.Ry(s.fe-3),v=new r.H3([g,l.kl]),E=new r.H3([v]),C=2,k=8,M=3,S=12,$=20,R=((a={}).PINTEREST_LOGO="web.vertical_nav.pinterest_logo.click",a.HOME="web.vertical_nav.home.click",a.TODAY="web.vertical_nav.today.click",a.CREATE="web.vertical_nav.create.click",a.NEWS="web.vertical_nav.news.click",a.CONVERSATIONS="web.vertical_nav.conversations.click",a.AVATAR="web.vertical_nav.avatar.click",a.ACCOUNT_SWITCHER="web.vertical_nav.account_switcher.click",a.MORE_OPTIONS_OPT_OUT="web.vertical_nav.more_options.opt_out",a.MORE_OPTIONS="web.vertical_nav.more_options.click",a),O=((i={}).CONTROL="control",i.EMPLOYEES="employees",i.ENABLED="enabled",i.ENABLED_HOME_BUTTON="enabled_home_button",i.ENABLED_HOME_AND_LOGO="enabled_home_and_logo",i.NONE="",i),G=e=>({tags:{experimentGroup:e}})},862014:(e,t,n)=>{n.d(t,{M:()=>r,f:()=>i});var a=n(914896);let i=()=>{a.t8({name:"forced_experiments",purpose:"personalization",httpOnly:!1,duration:"30d"},JSON.stringify({web_vertical_nav:!1}))},r=()=>{a.zN("forced_experiments")}},984821:(e,t,n)=>{n.d(t,{Z:()=>i});var a=n(282999);function i(e){return!((0,a.Gl)(e)||(0,a.PY)(e)||(0,a.jC)(e)||(0,a.Xn)(e)||(0,a.b_)(e)||(0,a.oF)(e)||(0,a.dt)(e)||(0,a.x7)(e)||(0,a.cY)(e)||(0,a.bb)(e))}},65967:(e,t,n)=>{n.d(t,{CZ:()=>o,Db:()=>s,Lu:()=>r,kl:()=>a,sb:()=>l,t3:()=>i,to:()=>u});let a=new(n(883119)).Ry(700),i="defaultInboxView",r="newMessageView",o="newMessageSelectRecipientsView",l="invitesRequestsView",s="followInviteEducationView",u=64}}]);
//# sourceMappingURL=https://sm.pinimg.com/webapp/168-8c2812916290d44e.mjs.map