import{a3 as $,a as d,c as q,w as a,_ as S,o as g,d as e,h as N,u as s,a4 as p,a6 as t,a7 as U,p as v,a8 as c,a9 as f,aa as _,ab as x,ac as y,ad as w,g as h}from"./index.c9720a49.js";import{_ as k,a as i,b as P,c as u,d as R}from"./UserCard.dd3620de.js";const M={class:"grid grid-cols-1 lg:grid-cols-2 gap-6"},Y={__name:"ProfileView",setup(A){const m=$(),n=d({name:m.userName,email:m.userEmail}),r=d({password_current:"",password:"",password_confirmation:""}),b=()=>{m.setUser(n)},V=()=>{};return(B,o)=>(g(),q(S,null,{default:a(()=>[e(h,null,{default:a(()=>[e(N,{icon:s(p),title:"Profile",main:""},{default:a(()=>[e(t,{href:"https://github.com/justboil/admin-one-vue-tailwind",target:"_blank",icon:s(U),label:"Star on GitHub",color:"contrast","rounded-full":"",small:""},null,8,["icon"])]),_:1},8,["icon"]),e(k,{class:"mb-6"}),v("div",M,[e(c,{"is-form":"",onSubmit:f(b,["prevent"])},{footer:a(()=>[e(_,null,{default:a(()=>[e(t,{color:"info",type:"submit",label:"Submit"}),e(t,{color:"info",label:"Options",outline:""})]),_:1})]),default:a(()=>[e(i,{label:"Avatar",help:"Max 500kb"},{default:a(()=>[e(P,{label:"Upload"})]),_:1}),e(i,{label:"Name",help:"Required. Your name"},{default:a(()=>[e(u,{modelValue:n.name,"onUpdate:modelValue":o[0]||(o[0]=l=>n.name=l),icon:s(p),name:"username",required:"",autocomplete:"username"},null,8,["modelValue","icon"])]),_:1}),e(i,{label:"E-mail",help:"Required. Your e-mail"},{default:a(()=>[e(u,{modelValue:n.email,"onUpdate:modelValue":o[1]||(o[1]=l=>n.email=l),icon:s(x),type:"email",name:"email",required:"",autocomplete:"email"},null,8,["modelValue","icon"])]),_:1})]),_:1},8,["onSubmit"]),e(c,{"is-form":"",onSubmit:f(V,["prevent"])},{footer:a(()=>[e(_,null,{default:a(()=>[e(t,{type:"submit",color:"info",label:"Submit"}),e(t,{color:"info",label:"Options",outline:""})]),_:1})]),default:a(()=>[e(i,{label:"Current password",help:"Required. Your current password"},{default:a(()=>[e(u,{modelValue:r.password_current,"onUpdate:modelValue":o[2]||(o[2]=l=>r.password_current=l),icon:s(y),name:"password_current",type:"password",required:"",autocomplete:"current-password"},null,8,["modelValue","icon"])]),_:1}),e(R),e(i,{label:"New password",help:"Required. New password"},{default:a(()=>[e(u,{modelValue:r.password,"onUpdate:modelValue":o[3]||(o[3]=l=>r.password=l),icon:s(w),name:"password",type:"password",required:"",autocomplete:"new-password"},null,8,["modelValue","icon"])]),_:1}),e(i,{label:"Confirm password",help:"Required. New password one more time"},{default:a(()=>[e(u,{modelValue:r.password_confirmation,"onUpdate:modelValue":o[4]||(o[4]=l=>r.password_confirmation=l),icon:s(w),name:"password_confirmation",type:"password",required:"",autocomplete:"new-password"},null,8,["modelValue","icon"])]),_:1})]),_:1},8,["onSubmit"])])]),_:1})]),_:1}))}};export{Y as default};
