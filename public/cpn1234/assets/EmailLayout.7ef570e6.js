import{p as m,r as e,v as p,w as a,_ as f,o as d,a as t,h as n,f as y}from"./index.5e381de2.js";import{A as h,M as k}from"./MailOutlined.82678a37.js";const b={__name:"EmailLayout",setup(v){const l=m([{key:"templates",icon:()=>n(h),href:"/email/templates",label:"Templates",title:"Templates"},{key:"History",icon:()=>n(k),label:"History",href:"/email/history",title:"History"}]);function s({item:o}){o.href&&y.push(o.href)}return(o,w)=>{const i=e("a-menu"),r=e("a-layout-sider"),_=e("router-view"),c=e("a-layout-content"),u=e("a-layout");return d(),p(f,null,{default:a(()=>[t(u,null,{default:a(()=>[t(r,{style:{width:"300px",background:"#fff","max-width":"40vw"}},{default:a(()=>[t(i,{onClick:s,mode:"vertical",items:l.value},null,8,["items"])]),_:1}),t(c,{style:{background:"#fff",padding:"24px",margin:0,minHeight:"280px"}},{default:a(()=>[t(_)]),_:1})]),_:1})]),_:1})}}};export{b as default};
