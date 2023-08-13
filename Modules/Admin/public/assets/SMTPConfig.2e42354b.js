import{j as i,k as _,r as m,e as P,l as e,w as a,m as b,F as k,A as c,o as M,i as y,J as F}from"./index.58385aa2.js";import{v as N}from"./validateMessages.02f7ed2e.js";const E={__name:"SMTPConfig",emits:["success","cancel"],setup(h,{emit:x}){const S=["smtp_server","smtp_port","smtp_security","smtp_user","smtp_password","smtp_email_from"],n=i(!1);i(null);const p=i(!1),t=_({}),f=_({email_to:""}),v=_({validateTrigger:"submit","label-align":"top",model:t,labelCol:{span:24},wrapperCol:{span:24},"validate-messages":N});(function(){n.value=!0,c.get("config",{params:{names:S}}).then(o=>{Object.assign(t,o.data)}).catch(o=>{}).finally(n.value=!1)})();const T=async function(){n.value=!0,c.post("config",t).then(o=>{x("success",o)}).catch(o=>{}).finally(n.value=!1)},U=async function(){c.post("config/testSmtp",{...t,...f}).then(o=>{p.value=!1}).catch(o=>{}).finally(n.value=!1)};return(o,l)=>{const r=m("a-input"),u=m("a-form-item"),d=m("a-row"),w=m("a-button"),q=m("a-space"),g=m("a-form"),C=m("a-modal");return M(),P(k,null,[e(g,b({autocomplete:"off",model:t},v,{onFinish:T}),{default:a(()=>[e(d,{class:"w-full"},{default:a(()=>[e(u,{class:"md:w-[200px] w-full mr-5",name:"smtp_server",label:"SMTP Server",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"domain.com",autocomplete:"off",value:t.smtp_server,"onUpdate:value":l[0]||(l[0]=s=>t.smtp_server=s)},null,8,["value"])]),_:1}),e(u,{class:"md:w-[200px] w-full mr-5",name:"smtp_port",label:"SMTP Port",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"25",autocomplete:"off",value:t.smtp_port,"onUpdate:value":l[1]||(l[1]=s=>t.smtp_port=s)},null,8,["value"])]),_:1}),e(u,{class:"md:w-[200px] w-full mr-5",name:"smtp_security",label:"Security",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"tls",autocomplete:"off",value:t.smtp_security,"onUpdate:value":l[2]||(l[2]=s=>t.smtp_security=s)},null,8,["value"])]),_:1})]),_:1}),e(d,{class:"w-full"},{default:a(()=>[e(u,{class:"md:w-[200px] w-full mr-5",name:"smtp_user",label:"User",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"User",autocomplete:"off",value:t.smtp_user,"onUpdate:value":l[3]||(l[3]=s=>t.smtp_user=s)},null,8,["value"])]),_:1}),e(u,{class:"md:w-[200px] w-full mr-5",name:"smtp_password",label:"Password",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"Password",type:"password",autocomplete:"off",value:t.smtp_password,"onUpdate:value":l[4]||(l[4]=s=>t.smtp_password=s)},null,8,["value"])]),_:1})]),_:1}),e(d,{class:"w-full"},{default:a(()=>[e(u,{class:"md:w-[200px] w-full mr-5",name:"smtp_email_from",label:"From email",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"test@example.com",autocomplete:"off",value:t.smtp_email_from,"onUpdate:value":l[5]||(l[5]=s=>t.smtp_email_from=s)},null,8,["value"])]),_:1})]),_:1}),e(u,null,{default:a(()=>[e(q,null,{default:a(()=>[e(w,{loading:n.value,type:"primary","html-type":"submit"},{default:a(()=>[y("Submit")]),_:1},8,["loading"]),e(w,{onClick:l[6]||(l[6]=F(s=>p.value=!0,["prevent"]))},{default:a(()=>[y("Test")]),_:1})]),_:1})]),_:1})]),_:1},16,["model"]),e(C,{open:p.value,"onUpdate:open":l[8]||(l[8]=s=>p.value=s),title:"Send Test Email",onOk:U},{default:a(()=>[e(g,b({class:"p-8",autocomplete:"off"},v,{model:f}),{default:a(()=>[e(u,{class:"w-full",name:"email_to",label:"Send to email",rules:[{required:!0}]},{default:a(()=>[e(r,{placeholder:"test@example.com",autocomplete:"off",value:f.email_to,"onUpdate:value":l[7]||(l[7]=s=>f.email_to=s)},null,8,["value"])]),_:1})]),_:1},16,["model"])]),_:1},8,["open"])],64)}}};export{E as default};
