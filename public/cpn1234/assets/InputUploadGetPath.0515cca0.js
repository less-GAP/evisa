import{_ as w}from"./InputUploadGetPath.vue_vue_type_script_lang.efb80945.js";import{R as $,r as o,o as s,c as k,x as S,v as p,z as d,a as t,w as a,$ as v,d as r,F as y,e as C}from"./index.5e381de2.js";const F=C("br",null,null,-1);function b(e,n,B,N,O,P){const u=o("a-image"),c=o("upload-outlined"),i=o("a-button"),m=o("a-upload"),f=o("SelectOutlined"),g=o("a-space"),h=o("FilePicker"),_=o("a-modal");return s(),k(y,null,[S(e.$slots,"default"),e.value?(s(),p(u,{key:0,width:e.width,height:e.height,src:e.$url(e.value),alt:e.alt},null,8,["width","height","src","alt"])):d("",!0),F,t(g,{class:"mt-2"},{default:a(()=>[t(m,v(e.$attrs,{customRequest:e.upload,openFileDialogOnClick:!0,withCredentials:!0,"list-type":e.listType,action:e.action,accept:e.accept,showUploadList:!1}),{default:a(()=>[t(i,{size:"mini",loading:e.loading},{default:a(()=>[t(c),r(" Upload ")]),_:1},8,["loading"])]),_:1},16,["customRequest","list-type","action","accept"]),e.showSelect?(s(),p(i,{key:0,type:"primary",size:"mini",onClick:n[0]||(n[0]=l=>e.open=!0),loading:e.loading},{default:a(()=>[t(f),r(" Or Select ")]),_:1},8,["loading"])):d("",!0)]),_:1}),t(_,{"append-to-body":"",open:e.open,"onUpdate:open":n[2]||(n[2]=l=>e.open=l),top:"2%",height:"96vh",width:"90vw",title:"Select file"},{footer:a(()=>[]),default:a(()=>[t(h,{onClose:n[1]||(n[1]=l=>e.open=!1),onSelect:e.onSelect},null,8,["onSelect"])]),_:1},8,["open"])],64)}const z=$(w,[["render",b]]);export{z as I};