import{P as g,G as N,x as q,o as v,c as h,w as a,a as e,Q as U,R as k,j as t,f as p,C as j,S as C,u as i,T as P,g as f,v as b,_ as R,b as A,d as m,y as V,z as x,A as d,B,i as F,E as y,k as M,F as E,U as G,V as $}from"./index.e531cf52.js";import{a as T,_ as r}from"./FormField.d77ef9d4.js";import{_ as Y}from"./FormFilePicker.a0eace5e.js";const D={class:"space-y-3 text-center md:text-left lg:mx-12"},H={class:"flex justify-center md:block"},O={class:"text-2xl"},z=t("p",null,[p("Last login "),t("b",null,"12 mins ago"),p(" from "),t("b",null,"127.0.0.1")],-1),L={class:"flex justify-center md:block"},Q={__name:"UserCard",setup(S){const u=g(),n=N(()=>u.userName),s=q(!1);return(_,c)=>(v(),h(f,null,{default:a(()=>[e(U,{type:"justify-around lg:justify-center"},{default:a(()=>[e(k,{class:"lg:mx-12"}),t("div",D,[t("div",H,[e(T,{modelValue:s.value,"onUpdate:modelValue":c[0]||(c[0]=w=>s.value=w),name:"notifications-switch",type:"switch",label:"Notifications","input-value":!0},null,8,["modelValue"])]),t("h1",O,[p(" Howdy, "),t("b",null,j(n.value),1),p("! ")]),z,t("div",L,[e(C,{label:"Verified",color:"info",icon:i(P)},null,8,["icon"])])])]),_:1})]),_:1}))}},I={class:"grid grid-cols-1 lg:grid-cols-2 gap-6"},X={__name:"ProfileView",setup(S){const u=g(),n=b({name:u.userName,email:u.userEmail}),s=b({password_current:"",password:"",password_confirmation:""}),_=()=>{u.setUser(n)},c=()=>{};return(w,o)=>(v(),h(R,null,{default:a(()=>[e(F,null,{default:a(()=>[e(A,{icon:i(y),title:"Profile",main:""},{default:a(()=>[e(m,{href:"https://github.com/justboil/admin-one-vue-tailwind",target:"_blank",icon:i(M),label:"Star on GitHub",color:"contrast","rounded-full":"",small:""},null,8,["icon"])]),_:1},8,["icon"]),e(Q,{class:"mb-6"}),t("div",I,[e(f,{"is-form":"",onSubmit:V(_,["prevent"])},{footer:a(()=>[e(x,null,{default:a(()=>[e(m,{color:"info",type:"submit",label:"Submit"}),e(m,{color:"info",label:"Options",outline:""})]),_:1})]),default:a(()=>[e(r,{label:"Avatar",help:"Max 500kb"},{default:a(()=>[e(Y,{label:"Upload"})]),_:1}),e(r,{label:"Name",help:"Required. Your name"},{default:a(()=>[e(d,{modelValue:n.name,"onUpdate:modelValue":o[0]||(o[0]=l=>n.name=l),icon:i(y),name:"username",required:"",autocomplete:"username"},null,8,["modelValue","icon"])]),_:1}),e(r,{label:"E-mail",help:"Required. Your e-mail"},{default:a(()=>[e(d,{modelValue:n.email,"onUpdate:modelValue":o[1]||(o[1]=l=>n.email=l),icon:i(E),type:"email",name:"email",required:"",autocomplete:"email"},null,8,["modelValue","icon"])]),_:1})]),_:1},8,["onSubmit"]),e(f,{"is-form":"",onSubmit:V(c,["prevent"])},{footer:a(()=>[e(x,null,{default:a(()=>[e(m,{type:"submit",color:"info",label:"Submit"}),e(m,{color:"info",label:"Options",outline:""})]),_:1})]),default:a(()=>[e(r,{label:"Current password",help:"Required. Your current password"},{default:a(()=>[e(d,{modelValue:s.password_current,"onUpdate:modelValue":o[2]||(o[2]=l=>s.password_current=l),icon:i(G),name:"password_current",type:"password",required:"",autocomplete:"current-password"},null,8,["modelValue","icon"])]),_:1}),e(B),e(r,{label:"New password",help:"Required. New password"},{default:a(()=>[e(d,{modelValue:s.password,"onUpdate:modelValue":o[3]||(o[3]=l=>s.password=l),icon:i($),name:"password",type:"password",required:"",autocomplete:"new-password"},null,8,["modelValue","icon"])]),_:1}),e(r,{label:"Confirm password",help:"Required. New password one more time"},{default:a(()=>[e(d,{modelValue:s.password_confirmation,"onUpdate:modelValue":o[4]||(o[4]=l=>s.password_confirmation=l),icon:i($),name:"password_confirmation",type:"password",required:"",autocomplete:"new-password"},null,8,["modelValue","icon"])]),_:1})]),_:1},8,["onSubmit"])])]),_:1})]),_:1}))}};export{X as default};
