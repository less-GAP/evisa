import{l as B,$ as U,p as i,f as v,A as p,r as s,v as k,w as t,_ as L,o as N,a,d as f,b as R,a0 as $,i as F}from"./index.7ddb33e0.js";/* empty css              */const S=B({__name:"Detail",setup(O){U();const h=i(!1),E=i(),u=i({country_code:null,province_code:null});var m=v.currentRoute.value.params.id;m>0&&(h.value=!0,p.get("wards/"+m).then(o=>{var e=o.data.data;u.value=e,h.value=!1}));const g=i([]),x=i([]),D=i([]);p.get("countries/all").then(o=>{o.data.length>0&&o.data.forEach((e,r)=>{var l={value:e.code,label:e.code+" - "+e.name};g.value.push(l)})}),u.value.country_code!=null&&C(),u.value.province_code!=null&&y();const C=()=>{p.get("provinces/all?country_code="+u.value.country_code).then(o=>{o.data.length>0&&o.data.forEach((e,r)=>{var l={value:e.code,label:e.code+" - "+e.name};x.value.push(l)})})},y=()=>{p.get("districts/all?country_code="+u.value.country_code+"&province_code="+u.value.province_code).then(o=>{o.data.length>0&&o.data.forEach((e,r)=>{var l={value:e.code,label:e.code+" - "+e.name};D.value.push(l)})})},_=(o,e)=>e.label.toLowerCase().indexOf(o.toLowerCase())>=0||e.value.toLowerCase().indexOf(o.toLowerCase())>=0,q=()=>{E.value.validate().then(()=>{p.post("wards",$(u.value)).then(o=>{F[o.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:o.data.message}),o.data.code==1&&v.push("/wards")})}).catch(o=>{F.error({message:"Th\xF4ng b\xE1o",description:o})})},T=()=>{v.push("/wards")};return(o,e)=>{const r=s("a-select"),l=s("a-form-item"),d=s("a-col"),c=s("a-row"),A=s("a-input"),b=s("a-select-option"),w=s("a-button"),V=s("a-form");return N(),k(L,null,{default:t(()=>[a(R,null,{default:t(()=>[a(V,{layout:"vertical",ref_key:"formRef",ref:E,model:u.value,onFinish:q},{default:t(()=>[a(c,{gutter:20},{default:t(()=>[a(d,{span:12,offset:6},{default:t(()=>[a(l,{label:"Qu\u1ED1c gia",name:"country_code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 qu\u1ED1c gia!"}]},{default:t(()=>[a(r,{ref:"select",placeholder:"Ch\u1ECDn qu\u1ED1c gia...","show-search":"","filter-option":_,value:u.value.country_code,"onUpdate:value":e[0]||(e[0]=n=>u.value.country_code=n),options:g.value,onChange:C},null,8,["value","options"])]),_:1})]),_:1})]),_:1}),a(c,{gutter:20},{default:t(()=>[a(d,{span:12,offset:6},{default:t(()=>[a(l,{label:"T\u1EC9nh/th\xE0nh ph\u1ED1",name:"province_code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\u1EC9nh/th\xE0nh ph\u1ED1!"}]},{default:t(()=>[a(r,{ref:"select",placeholder:"Ch\u1ECDn t\u1EC9nh/th\xE0nh ph\u1ED1...","show-search":"","filter-option":_,value:u.value.province_code,"onUpdate:value":e[1]||(e[1]=n=>u.value.province_code=n),options:x.value,onChange:y},null,8,["value","options"])]),_:1})]),_:1})]),_:1}),a(c,{gutter:20},{default:t(()=>[a(d,{span:12,offset:6},{default:t(()=>[a(l,{label:"Qu\u1EADn/huy\u1EC7n",name:"district_code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp qu\u1EADn/huy\u1EC7n!"}]},{default:t(()=>[a(r,{ref:"select",placeholder:"Ch\u1ECDn qu\u1EADn/huy\u1EC7n...","show-search":"","filter-option":_,value:u.value.district_code,"onUpdate:value":e[2]||(e[2]=n=>u.value.district_code=n),options:D.value},null,8,["value","options"])]),_:1})]),_:1})]),_:1}),a(c,{gutter:20},{default:t(()=>[a(d,{span:12,offset:6},{default:t(()=>[a(l,{label:"M\xE3 ph\u01B0\u1EDDng/x\xE3",name:"code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 ph\u01B0\u1EDDng/x\xE3!"}]},{default:t(()=>[a(A,{value:u.value.code,"onUpdate:value":e[3]||(e[3]=n=>u.value.code=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),a(c,{gutter:20},{default:t(()=>[a(d,{span:12,offset:6},{default:t(()=>[a(l,{label:"T\xEAn ph\u01B0\u1EDDng/x\xE3",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp ph\u01B0\u1EDDng/x\xE3!"}]},{default:t(()=>[a(A,{value:u.value.name,"onUpdate:value":e[4]||(e[4]=n=>u.value.name=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),a(c,{gutter:20},{default:t(()=>[a(d,{span:12,offset:6},{default:t(()=>[a(l,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:t(()=>[a(r,{value:u.value.status,"onUpdate:value":e[5]||(e[5]=n=>u.value.status=n),placeholder:""},{default:t(()=>[a(b,{value:"A"},{default:t(()=>[f("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),a(b,{value:"D"},{default:t(()=>[f("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1})]),_:1}),a(l,{"wrapper-col":{offset:6,span:12}},{default:t(()=>[a(w,{type:"primary","html-type":"submit"},{default:t(()=>[f("L\u01B0u")]),_:1}),a(w,{type:"primary",ghost:"",onClick:e[6]||(e[6]=n=>T()),class:"ml-5"},{default:t(()=>[f("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1})}}});export{S as default};
