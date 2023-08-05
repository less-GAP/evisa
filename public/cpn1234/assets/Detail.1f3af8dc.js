import{l as q,$ as y,p as _,f as v,A as E,r as n,v as C,w as a,_ as U,o as V,a as e,d as i,b as T,a0 as k,i as A}from"./index.e9f28c59.js";/* empty css              */const $=q({__name:"Detail",setup(w){y();const m=_(!1),c=_(),t=_({});var f=v.currentRoute.value.params.id;f>0&&(m.value=!0,E.get("countries/"+f).then(o=>{var u=o.data.data;t.value=u,m.value=!1}));const D=()=>{c.value.validate().then(()=>{E.post("countries",k(t.value)).then(o=>{A[o.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:o.data.message}),o.data.code==1&&v.push("/countries")})}).catch(o=>{A.error({message:"Th\xF4ng b\xE1o",description:o})})},h=()=>{v.push("/countries")};return(o,u)=>{const d=n("a-input"),s=n("a-form-item"),r=n("a-col"),p=n("a-row"),x=n("a-select-option"),N=n("a-select"),g=n("a-button"),b=n("a-space"),F=n("a-form");return V(),C(U,null,{default:a(()=>[e(T,null,{default:a(()=>[e(F,{layout:"vertical",ref_key:"formRef",ref:c,model:t.value,onFinish:D},{default:a(()=>[e(p,{gutter:20},{default:a(()=>[e(r,{span:12},{default:a(()=>[e(s,{label:"M\xE3 qu\u1ED1c gia",name:"code",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 qu\u1ED1c gia!"}]},{default:a(()=>[e(d,{value:t.value.code,"onUpdate:value":u[0]||(u[0]=l=>t.value.code=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(r,{span:12},{default:a(()=>[e(s,{label:"T\xEAn qu\u1ED1c gia",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\xEAn qu\u1ED1c gia!"}]},{default:a(()=>[e(d,{value:t.value.name,"onUpdate:value":u[1]||(u[1]=l=>t.value.name=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),e(p,{gutter:20},{default:a(()=>[e(r,{span:12},{default:a(()=>[e(s,{label:"M\xE3 A3",name:"code_A3",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 A3!"}]},{default:a(()=>[e(d,{value:t.value.code_A3,"onUpdate:value":u[2]||(u[2]=l=>t.value.code_A3=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(r,{span:12},{default:a(()=>[e(s,{label:"M\xE3 N3",name:"code_N3",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 N3!"}]},{default:a(()=>[e(d,{value:t.value.code_N3,"onUpdate:value":u[3]||(u[3]=l=>t.value.code_N3=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),e(p,{gutter:20},{default:a(()=>[e(r,{span:12},{default:a(()=>[e(s,{label:"M\xE3 v\xF9ng",name:"region",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE3 v\xF9ng!"}]},{default:a(()=>[e(d,{value:t.value.region,"onUpdate:value":u[4]||(u[4]=l=>t.value.region=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(r,{span:12},{default:a(()=>[e(s,{label:"Nh\u1EADp v\u0129 \u0111\u1ED9(Latitude)",name:"latitude"},{default:a(()=>[e(d,{value:t.value.latitude,"onUpdate:value":u[5]||(u[5]=l=>t.value.latitude=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1})]),_:1}),e(p,{gutter:20},{default:a(()=>[e(r,{span:12},{default:a(()=>[e(s,{label:"Nh\u1EADp kinh \u0111\u1ED9(Longitude)",name:"longitude"},{default:a(()=>[e(d,{value:t.value.longitude,"onUpdate:value":u[6]||(u[6]=l=>t.value.longitude=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(r,{span:12},{default:a(()=>[e(s,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:a(()=>[e(N,{value:t.value.status,"onUpdate:value":u[7]||(u[7]=l=>t.value.status=l),placeholder:""},{default:a(()=>[e(x,{value:"A"},{default:a(()=>[i("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),e(x,{value:"D"},{default:a(()=>[i("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1})]),_:1}),e(b,{align:"center"},{default:a(()=>[e(g,{type:"primary","html-type":"submit"},{default:a(()=>[i("L\u01B0u")]),_:1}),e(g,{type:"primary",ghost:"",onClick:u[8]||(u[8]=l=>h())},{default:a(()=>[i("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1})}}});export{$ as default};
