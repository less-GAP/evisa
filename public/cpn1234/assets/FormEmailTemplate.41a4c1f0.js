import{p,k as f,f as _,r as n,v as U,w as t,Z as q,A as d,o as B,a as e,u as N,e as S,d as v}from"./index.e9f28c59.js";/* empty css              */import{V as T}from"./jodit-vue.es.9648541b.js";const j={class:"min-w-full text-center mt-20"},E={__name:"FormEmailTemplate",props:{value:Object},emits:["success","cancel"],setup(b,{emit:g}){const w=b,h={required:"${label} is required!",types:{email:"${label} is not a valid email!",number:"${label} is not a valid number!"},number:{range:"${label} must be between ${min} and ${max}"}},s=p(!1);p(null);const l=f(w.value||{isNew:!0,full_name:"",username:"",email:"",role:"user",password:""}),r=_.currentRoute.value.params.id,y=f({validateTrigger:"submit","label-align":"top",model:l,labelCol:{span:24},wrapperCol:{span:24},"validate-messages":h});r&&function(i){s.value=!0,d.get("email-template/"+i).then(a=>{Object.assign(l,a.data)}).catch(a=>{}).finally(s.value=!1)}(r);const V=async function(){s.value=!0,d.post("email-template",l).then(i=>{_.push("/email/templates")}).catch(i=>{}).finally(s.value=!1)},k=function(){g("cancel")};return(i,a)=>{const m=n("a-input"),u=n("a-form-item"),c=n("a-col"),C=n("a-button"),x=n("router-link"),$=n("a-row"),M=n("a-form");return B(),U(M,q({autocomplete:"off"},y,{onFinish:V}),{default:t(()=>[e($,{gutter:20},{default:t(()=>[e(c,{span:8},{default:t(()=>[e(u,{class:"w-full",name:"email_title",label:"Mail title",rules:[{required:!0}]},{default:t(()=>[e(m,{autocomplete:"off",value:l.email_title,"onUpdate:value":a[0]||(a[0]=o=>l.email_title=o)},null,8,["value"])]),_:1}),e(u,{class:"w-full",name:"email_reply_to",label:"Reply to"},{default:t(()=>[e(m,{autocomplete:"off",value:l.email_reply_to,"onUpdate:value":a[1]||(a[1]=o=>l.email_reply_to=o)},null,8,["value"])]),_:1}),e(u,{class:"w-full",name:"email_cc",label:"Mail cc"},{default:t(()=>[e(m,{placeholder:"Split with ;",autocomplete:"off",value:l.email_cc,"onUpdate:value":a[2]||(a[2]=o=>l.email_cc=o)},null,8,["value"])]),_:1}),e(u,{class:"w-full",name:"email_bcc",label:"Mail bcc"},{default:t(()=>[e(m,{placeholder:"Split with ;",autocomplete:"off",value:l.email_bcc,"onUpdate:value":a[3]||(a[3]=o=>l.email_bcc=o)},null,8,["value"])]),_:1})]),_:1}),e(c,{span:16},{default:t(()=>[e(u,{class:"w-full",name:"email_title",label:"Mail Content",rules:[{required:!0}]},{default:t(()=>[e(N(T),{style:{height:"50vh"},modelValue:l.email_content,"onUpdate:modelValue":a[4]||(a[4]=o=>l.email_content=o),config:{iframe:!0,height:"50vh"}},null,8,["modelValue"])]),_:1})]),_:1}),S("div",j,[e(C,{class:"mr-5",loading:s.value,type:"primary","html-type":"submit"},{default:t(()=>[v("Submit")]),_:1},8,["loading"]),e(x,{to:"/email/templates",onClick:k,"html-type":"button"},{default:t(()=>[v("Back")]),_:1})])]),_:1})]),_:1},16)}}};export{E as default};
