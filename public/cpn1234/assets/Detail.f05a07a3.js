import{l as F,$ as T,p as d,f as i,A as _,r as l,v as q,w as t,_ as V,o as k,a as e,d as p,b as L,a0 as N,i as C}from"./index.7ddb33e0.js";/* empty css              */const B=F({__name:"Detail",setup(R){T();const m=d(!1),v=d(),o=d({});var h=i.currentRoute.value.params.id;h>0&&(m.value=!0,_.get("provinces/"+h).then(u=>{var a=u.data.data;o.value=a,m.value=!1}));const E=d([]);_.get("countries/all").then(u=>{u.data.length>0&&u.data.forEach((a,f)=>{var s={value:a.code,label:a.code+" - "+a.name};E.value.push(s)})});const b=(u,a)=>a.label.toLowerCase().indexOf(u.toLowerCase())>=0||a.value.toLowerCase().indexOf(u.toLowerCase())>=0,A=()=>{v.value.validate().then(()=>{_.post("provinces",N(o.value)).then(u=>{C[u.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:u.data.message}),u.data.code==1&&i.push("/provinces")})}).catch(u=>{C.error({message:"Th\xF4ng b\xE1o",description:u})})},y=()=>{i.push("/provinces")};return(u,a)=>{const f=l("a-select"),s=l("a-form-item"),r=l("a-col"),c=l("a-row"),x=l("a-input"),g=l("a-select-option"),D=l("a-button"),w=l("a-form");return k(),q(V,null,{default:t(()=>[e(L,null,{default:t(()=>[e(w,{layout:"vertical",ref_key:"formRef",ref:v,model:o.value,onFinish:A},{default:t(()=>[e(c,{gutter:20},{default:t(()=>[e(r,{span:12,offset:6},{default:t(()=>[e(s,{label:"Qu\u1ED1c gia",name:"country_code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 qu\u1ED1c gia!"}]},{default:t(()=>[e(f,{ref:"select",placeholder:"Ch\u1ECDn qu\u1ED1c gia...","show-search":"","filter-option":b,value:o.value.country_code,"onUpdate:value":a[0]||(a[0]=n=>o.value.country_code=n),options:E.value},null,8,["value","options"])]),_:1})]),_:1})]),_:1}),e(c,{gutter:20},{default:t(()=>[e(r,{span:12,offset:6},{default:t(()=>[e(s,{label:"M\xE3 t\u1EC9nh/th\xE0nh ph\u1ED1",name:"code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 t\u1EC9nh/th\xE0nh ph\u1ED1!"}]},{default:t(()=>[e(x,{value:o.value.code,"onUpdate:value":a[1]||(a[1]=n=>o.value.code=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),e(c,{gutter:20},{default:t(()=>[e(r,{span:12,offset:6},{default:t(()=>[e(s,{label:"T\xEAn t\u1EC9nh/th\xE0nh ph\u1ED1",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\u1EC9nh/th\xE0nh ph\u1ED1!"}]},{default:t(()=>[e(x,{value:o.value.name,"onUpdate:value":a[2]||(a[2]=n=>o.value.name=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),e(c,{gutter:20},{default:t(()=>[e(r,{span:12,offset:6},{default:t(()=>[e(s,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:t(()=>[e(f,{value:o.value.status,"onUpdate:value":a[3]||(a[3]=n=>o.value.status=n),placeholder:""},{default:t(()=>[e(g,{value:"A"},{default:t(()=>[p("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),e(g,{value:"D"},{default:t(()=>[p("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1})]),_:1}),e(s,{"wrapper-col":{offset:6,span:12}},{default:t(()=>[e(D,{type:"primary","html-type":"submit"},{default:t(()=>[p("L\u01B0u")]),_:1}),e(D,{type:"primary",ghost:"",onClick:a[4]||(a[4]=n=>y()),class:"ml-5"},{default:t(()=>[p("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1})}}});export{B as default};
