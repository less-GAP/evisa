import{j as m,r as e,c as p,w as a,_ as f,o as d,l as t,N as n,L as y}from"./index.58385aa2.js";import{A as h,M as k}from"./MailOutlined.a4b98ac8.js";const b={__name:"EmailLayout",setup(w){const l=m([{key:"templates",icon:()=>n(h),href:"/email/templates",label:"Templates",title:"Templates"},{key:"History",icon:()=>n(k),label:"History",href:"/email/history",title:"History"}]);function s({item:o}){o.href&&y.push(o.href)}return(o,x)=>{const i=e("a-menu"),r=e("a-layout-sider"),c=e("router-view"),_=e("a-layout-content"),u=e("a-layout");return d(),p(f,null,{default:a(()=>[t(u,null,{default:a(()=>[t(r,{style:{width:"300px",background:"#fff","max-width":"40vw"}},{default:a(()=>[t(i,{onClick:s,mode:"vertical",items:l.value},null,8,["items"])]),_:1}),t(_,{style:{background:"#fff",padding:"24px",margin:0,minHeight:"280px"}},{default:a(()=>[t(c)]),_:1})]),_:1})]),_:1})}}};export{b as default};
