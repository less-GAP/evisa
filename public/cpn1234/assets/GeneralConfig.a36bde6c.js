import{Q as q,e as o,o as d,g as N,x as O,c as v,k as w,f as t,w as a,m as U,b as h,F as B,a as P,r as C,d as k,A as $,u as V}from"./index.5a79ff9f.js";import{v as T}from"./validateMessages.02f7ed2e.js";import{a as z}from"./InputUploadGetPath.vue_vue_type_script_lang.f8c4914b.js";const A=P("br",null,null,-1);function G(e,s,b,u,n,S){const y=o("a-image"),m=o("upload-outlined"),l=o("a-button"),i=o("a-upload"),f=o("SelectOutlined"),p=o("a-space"),_=o("FilePicker"),g=o("a-modal");return d(),N(B,null,[O(e.$slots,"default"),e.value?(d(),v(y,{key:0,width:e.width,height:e.height,src:e.$url(e.value),alt:e.alt},null,8,["width","height","src","alt"])):w("",!0),A,t(p,{class:"mt-2"},{default:a(()=>[t(i,U(e.$attrs,{customRequest:e.upload,openFileDialogOnClick:!0,withCredentials:!0,"list-type":e.listType,action:e.action,accept:e.accept,showUploadList:!1}),{default:a(()=>[t(l,{size:"mini",loading:e.loading},{default:a(()=>[t(m),h(" Upload ")]),_:1},8,["loading"])]),_:1},16,["customRequest","list-type","action","accept"]),e.showSelect?(d(),v(l,{key:0,type:"primary",size:"mini",onClick:s[0]||(s[0]=r=>e.open=!0),loading:e.loading},{default:a(()=>[t(f),h(" Or Select ")]),_:1},8,["loading"])):w("",!0)]),_:1}),t(g,{"append-to-body":"",open:e.open,"onUpdate:open":s[2]||(s[2]=r=>e.open=r),top:"2%",height:"96vh",width:"90vw",title:"Select file"},{footer:a(()=>[]),default:a(()=>[t(_,{onClose:s[1]||(s[1]=r=>e.open=!1),onSelect:e.onSelect},null,8,["onSelect"])]),_:1},8,["open"])],64)}const L=q(z,[["render",G]]),E={__name:"GeneralConfig",emits:["success","cancel"],setup(e,{emit:s}){const b=["site_title","site_logo","site_description"],u=C(!1);C(null);const n=k({}),S=k({validateTrigger:"submit","label-align":"top",model:n,labelCol:{span:24},wrapperCol:{span:24},"validate-messages":T});(function(){u.value=!0,$.get("config",{params:{names:b}}).then(l=>{Object.assign(n,l.data)}).catch(l=>{}).finally(u.value=!1)})();const m=async function(){u.value=!0,$.post("config",n).then(l=>{s("success",l)}).catch(l=>{}).finally(u.value=!1)};return(l,i)=>{const f=o("a-input"),p=o("a-form-item"),_=o("a-textarea"),g=o("a-button"),r=o("a-space"),F=o("a-form");return d(),v(F,U({autocomplete:"off"},S,{onFinish:m}),{default:a(()=>[t(p,{name:"site_title",label:"Site title",rules:[{required:!0}]},{default:a(()=>[t(f,{autocomplete:"off",value:n.site_title,"onUpdate:value":i[0]||(i[0]=c=>n.site_title=c)},null,8,["value"])]),_:1}),t(p,{name:"site_description",label:"Site description",rules:[{required:!0}]},{default:a(()=>[t(_,{autocomplete:"off",value:n.site_description,"onUpdate:value":i[1]||(i[1]=c=>n.site_description=c)},null,8,["value"])]),_:1}),t(p,{name:"site_logo",label:"Site Logo",rules:[{required:!0}]},{default:a(()=>[t(V(L),{width:"200px",alt:"Site logo",autocomplete:"off",value:n.site_logo,"onUpdate:value":i[2]||(i[2]=c=>n.site_logo=c)},null,8,["value"])]),_:1}),t(p,null,{default:a(()=>[t(r,null,{default:a(()=>[t(g,{loading:u.value,type:"primary","html-type":"submit"},{default:a(()=>[h("Submit")]),_:1},8,["loading"])]),_:1})]),_:1})]),_:1},16)}}};export{E as default};
