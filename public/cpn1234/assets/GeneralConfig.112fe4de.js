import{p as r,k as p,r as s,v as C,w as a,Z as S,A as c,o as h,a as t,u as w,d as U}from"./index.7ddb33e0.js";import{v as k}from"./validateMessages.02f7ed2e.js";import"./InputUpload.vue_vue_type_script_lang.1043165f.js";import{I as q}from"./InputUpload.cdcb4576.js";const j={__name:"GeneralConfig",emits:["success","cancel"],setup(N,{emit:m}){const f=["site_title","site_logo","site_description"],n=r(!1);r(null);const e=p({}),_=p({validateTrigger:"submit","label-align":"top",model:e,labelCol:{span:24},wrapperCol:{span:24},"validate-messages":k});(function(){n.value=!0,c.get("config",{params:{names:f}}).then(o=>{Object.assign(e,o.data)}).catch(o=>{}).finally(n.value=!1)})();const d=async function(){n.value=!0,c.post("config",e).then(o=>{m("success",o)}).catch(o=>{}).finally(n.value=!1)};return(o,l)=>{const g=s("a-input"),u=s("a-form-item"),v=s("a-textarea"),b=s("a-button"),x=s("a-space"),y=s("a-form");return h(),C(y,S({autocomplete:"off"},_,{onFinish:d}),{default:a(()=>[t(u,{name:"site_title",label:"Site title",rules:[{required:!0}]},{default:a(()=>[t(g,{autocomplete:"off",value:e.site_title,"onUpdate:value":l[0]||(l[0]=i=>e.site_title=i)},null,8,["value"])]),_:1}),t(u,{name:"site_description",label:"Site description",rules:[{required:!0}]},{default:a(()=>[t(v,{autocomplete:"off",value:e.site_description,"onUpdate:value":l[1]||(l[1]=i=>e.site_description=i)},null,8,["value"])]),_:1}),t(u,{name:"site_logo",label:"Site Logo",rules:[{required:!0}]},{default:a(()=>[t(w(q),{width:"200px",alt:"Site logo",autocomplete:"off",value:e.site_logo,"onUpdate:value":l[2]||(l[2]=i=>e.site_logo=i)},null,8,["value"])]),_:1}),t(u,null,{default:a(()=>[t(x,null,{default:a(()=>[t(b,{loading:n.value,type:"primary","html-type":"submit"},{default:a(()=>[U("Submit")]),_:1},8,["loading"])]),_:1})]),_:1})]),_:1},16)}}};export{j as default};
