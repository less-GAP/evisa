import{a2 as $,k as d,v as q,w as a,_ as S,o as g,a as e,a3 as v,u as s,a4 as p,a8 as t,a9 as N,e as U,aa as c,ab as f,ac as _,ad as k,ae as x,af as w,b as y}from"./index.5e381de2.js";import{_ as P,a as i,b as R,c as u,d as h}from"./UserCard.8734ed5f.js";const M={class:"grid grid-cols-1 lg:grid-cols-2 gap-6"},Y={__name:"ProfileView",setup(A){const m=$(),n=d({name:m.userName,email:m.userEmail}),r=d({password_current:"",password:"",password_confirmation:""}),b=()=>{m.setUser(n)},V=()=>{};return(B,o)=>(g(),q(S,null,{default:a(()=>[e(y,null,{default:a(()=>[e(v,{icon:s(p),title:"Profile",main:""},{default:a(()=>[e(t,{href:"https://github.com/justboil/admin-one-vue-tailwind",target:"_blank",icon:s(N),label:"Star on GitHub",color:"contrast","rounded-full":"",small:""},null,8,["icon"])]),_:1},8,["icon"]),e(P,{class:"mb-6"}),U("div",M,[e(c,{"is-form":"",onSubmit:f(b,["prevent"])},{footer:a(()=>[e(_,null,{default:a(()=>[e(t,{color:"info",type:"submit",label:"Submit"}),e(t,{color:"info",label:"Options",outline:""})]),_:1})]),default:a(()=>[e(i,{label:"Avatar",help:"Max 500kb"},{default:a(()=>[e(R,{label:"Upload"})]),_:1}),e(i,{label:"Name",help:"Required. Your name"},{default:a(()=>[e(u,{modelValue:n.name,"onUpdate:modelValue":o[0]||(o[0]=l=>n.name=l),icon:s(p),name:"username",required:"",autocomplete:"username"},null,8,["modelValue","icon"])]),_:1}),e(i,{label:"E-mail",help:"Required. Your e-mail"},{default:a(()=>[e(u,{modelValue:n.email,"onUpdate:modelValue":o[1]||(o[1]=l=>n.email=l),icon:s(k),type:"email",name:"email",required:"",autocomplete:"email"},null,8,["modelValue","icon"])]),_:1})]),_:1},8,["onSubmit"]),e(c,{"is-form":"",onSubmit:f(V,["prevent"])},{footer:a(()=>[e(_,null,{default:a(()=>[e(t,{type:"submit",color:"info",label:"Submit"}),e(t,{color:"info",label:"Options",outline:""})]),_:1})]),default:a(()=>[e(i,{label:"Current password",help:"Required. Your current password"},{default:a(()=>[e(u,{modelValue:r.password_current,"onUpdate:modelValue":o[2]||(o[2]=l=>r.password_current=l),icon:s(x),name:"password_current",type:"password",required:"",autocomplete:"current-password"},null,8,["modelValue","icon"])]),_:1}),e(h),e(i,{label:"New password",help:"Required. New password"},{default:a(()=>[e(u,{modelValue:r.password,"onUpdate:modelValue":o[3]||(o[3]=l=>r.password=l),icon:s(w),name:"password",type:"password",required:"",autocomplete:"new-password"},null,8,["modelValue","icon"])]),_:1}),e(i,{label:"Confirm password",help:"Required. New password one more time"},{default:a(()=>[e(u,{modelValue:r.password_confirmation,"onUpdate:modelValue":o[4]||(o[4]=l=>r.password_confirmation=l),icon:s(w),name:"password_confirmation",type:"password",required:"",autocomplete:"new-password"},null,8,["modelValue","icon"])]),_:1})]),_:1},8,["onSubmit"])])]),_:1})]),_:1}))}};export{Y as default};
