import{j as f,r as e,c as m,w as n,_ as p,o as d,l as t,N as a,L as h}from"./index.79b85385.js";import{M as y,A as g}from"./MailOutlined.b7d76647.js";const C={__name:"ConfigLayout",setup(k){const l=f([{key:"General",icon:()=>a(y),label:"General",href:"/configs/general",title:"General"},{key:"smtp",icon:()=>a(g),href:"/configs/smtp",label:"SMTP",title:"SMTP"}]);function s({item:o}){o.href&&h.push(o.href)}return(o,w)=>{const r=e("a-menu"),c=e("a-layout-sider"),i=e("router-view"),_=e("a-layout-content"),u=e("a-layout");return d(),m(p,null,{default:n(()=>[t(u,null,{default:n(()=>[t(c,{style:{width:"300px",background:"#fff","max-width":"40vw"}},{default:n(()=>[t(r,{onClick:s,mode:"vertical",items:l.value},null,8,["items"])]),_:1}),t(_,{style:{background:"#fff",padding:"24px",margin:0,minHeight:"280px"}},{default:n(()=>[t(i)]),_:1})]),_:1})]),_:1})}}};export{C as default};
