import{l as J,a2 as K,p as r,f as E,A as p,r as s,v as b,w as e,_ as O,o as d,a as t,c as x,z as m,d as i,t as n,F as T,e as o,b as Q,V as U,i as F}from"./index.bfd5160c.js";/* empty css              */const W=["src","alt"],X=o("b",null,"Th\xE0nh ti\u1EC1n",-1),Y=o("b",null,"Gi\u1EA3m gi\xE1",-1),Z=o("b",null,"Ph\xED v\u1EADn chuy\u1EC3n",-1),ee=o("b",null,"T\u1ED5ng ti\u1EC1n",-1),te=o("h4",{class:"mt-5"},[o("b",null,"Ghi ch\xFA")],-1),ae=o("b",null,"Th\xF4ng tin kh\xE1ch h\xE0ng",-1),le=o("b",null,"Ph\u01B0\u01A1ng th\u1EE9c thanh to\xE1n",-1),ne=o("b",null,"Ph\u01B0\u01A1ng th\u1EE9c giao h\xE0ng",-1),oe=o("b",null,"Th\xF4ng giao h\xE0ng",-1),_e=J({__name:"Detail",setup(ue){K();const k=r(!1),A=r(),a=r({country_code:null,province_code:null});var C=E.currentRoute.value.params.id;C>0&&(k.value=!0,p.get("orders/"+C).then(l=>{var u=l.data.data;a.value=u,k.value=!1}));const B=[{title:"H\xECnh \u1EA3nh",dataIndex:"image",key:"image"},{title:"S\u1EA3n ph\u1EA9m",dataIndex:"product_name",key:"product_name"},{title:"S\u1ED1 l\u01B0\u1EE3ng",dataIndex:"amount",key:"amount",align:"right"},{title:"\u0110\u01A1n gi\xE1",dataIndex:"price",key:"price",align:"right"},{title:"Th\xE0nh ti\u1EC1n",key:"subtotal",dataIndex:"subtotal",align:"right"}],S=r([]),$=r([]),M=r([]);p.get("countries/all").then(l=>{l.data.length>0&&l.data.forEach((u,c)=>{var _={value:u.code,label:u.code+" - "+u.name};S.value.push(_)})}),a.value.country_code!=null&&V(),a.value.province_code!=null&&I();const V=()=>{p.get("provinces/all?country_code="+a.value.country_code).then(l=>{l.data.length>0&&l.data.forEach((u,c)=>{var _={value:u.code,label:u.code+" - "+u.name};$.value.push(_)})})},I=()=>{p.get("districts/all?country_code="+a.value.country_code+"&province_code="+a.value.province_code).then(l=>{l.data.length>0&&l.data.forEach((u,c)=>{var _={value:u.code,label:u.code+" - "+u.name};M.value.push(_)})})},N=()=>{A.value.validate().then(()=>{p.post("wards",U(a.value)).then(l=>{F[l.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:l.data.message}),l.data.code==1&&E.push("/orders")})}).catch(l=>{F.error({message:"Th\xF4ng b\xE1o",description:l})})},P=()=>{E.push("/orders")};return(l,u)=>{const c=s("a-table-summary-cell"),_=s("a-typography-text"),f=s("a-table-summary-row"),R=s("a-table"),G=s("a-card"),w=s("a-col"),h=s("a-list-item-meta"),g=s("a-list-item"),D=s("a-tag"),z=s("a-list"),H=s("a-row"),L=s("a-button"),j=s("a-form-item"),q=s("a-form");return d(),b(O,null,{default:e(()=>[t(Q,null,{default:e(()=>[t(q,{layout:"vertical",ref_key:"formRef",ref:A,model:a.value,onFinish:N},{default:e(()=>[t(H,{gutter:20},{default:e(()=>[t(w,{span:16},{default:e(()=>[t(G,{title:"Th\xF4ng tin s\u1EA3n ph\u1EA9m"},{default:e(()=>[t(R,{columns:B,"data-source":a.value.details,pagination:!1},{bodyCell:e(({column:v,record:y})=>[v.key==="image"?(d(),x("img",{key:0,class:"w-20 h-auto float-left rounded-full",src:y.product_image_url,alt:y.product_name},null,8,W)):m("",!0),v.key==="price"?(d(),x(T,{key:1},[i(n(l.$format.formatMoney(y.price)),1)],64)):m("",!0),v.key==="subtotal"?(d(),x(T,{key:2},[i(n(l.$format.formatMoney(y.subtotal)),1)],64)):m("",!0)]),summary:e(()=>[t(f,null,{default:e(()=>[t(c,{colSpan:"4",align:"right"},{default:e(()=>[X]),_:1}),t(c,{align:"right"},{default:e(()=>[t(_,null,{default:e(()=>[i(n(l.$format.formatMoney(a.value.subtotal)),1)]),_:1})]),_:1})]),_:1}),t(f,null,{default:e(()=>[t(c,{colSpan:"4",align:"right"},{default:e(()=>[Y]),_:1}),t(c,{align:"right"},{default:e(()=>[t(_,null,{default:e(()=>[i(n(l.$format.formatMoney(a.value.discount)),1)]),_:1})]),_:1})]),_:1}),t(f,null,{default:e(()=>[t(c,{colSpan:"4",align:"right"},{default:e(()=>[Z]),_:1}),t(c,{align:"right"},{default:e(()=>[t(_,null,{default:e(()=>[i(n(l.$format.formatMoney(a.value.shipping_cost)),1)]),_:1})]),_:1})]),_:1}),t(f,null,{default:e(()=>[t(c,{colSpan:"4",align:"right"},{default:e(()=>[ee]),_:1}),t(c,{align:"right"},{default:e(()=>[t(_,null,{default:e(()=>[i(n(l.$format.formatMoney(a.value.total)),1)]),_:1})]),_:1})]),_:1})]),_:1},8,["data-source"]),te,o("p",null,n(a.value.notes),1)]),_:1})]),_:1}),t(w,{span:8},{default:e(()=>[t(z,{"item-layout":"vertical",bordered:""},{default:e(()=>[t(g,null,{default:e(()=>[t(h,null,{title:e(()=>[ae]),description:e(()=>[o("p",null,n(a.value.customer_name),1),o("p",null,n(a.value.customer_phone),1),o("p",null,n(a.value.customer_email),1)]),_:1})]),_:1}),t(g,null,{default:e(()=>[t(h,null,{title:e(()=>[le,a.value.payment_status=="success"?(d(),b(D,{key:0,color:"green"},{default:e(()=>[i("Th\xE0nh c\xF4ng")]),_:1})):m("",!0)]),description:e(()=>[o("p",null,n(a.value.payment_name),1)]),_:1})]),_:1}),t(g,null,{default:e(()=>[t(h,null,{title:e(()=>[ne,a.value.shipping_status=="waiting_confirm"?(d(),b(D,{key:0,color:"blue"},{default:e(()=>[i("Ch\u1EDD x\xE1c nh\u1EADn")]),_:1})):m("",!0)]),description:e(()=>[o("p",null,n(a.value.shipping_name),1)]),_:1})]),_:1}),t(g,null,{default:e(()=>[t(h,null,{title:e(()=>[oe]),description:e(()=>[o("p",null,n(a.value.s_name),1),o("p",null,n(a.value.s_phone),1),o("p",null,n(a.value.s_address)+", "+n(a.value.ward_name)+", "+n(a.value.district_name)+", "+n(a.value.province_name)+", "+n(a.value.country_name),1)]),_:1})]),_:1})]),_:1})]),_:1})]),_:1}),t(j,{"wrapper-col":{offset:8,span:12},class:"mt-5"},{default:e(()=>[m("",!0),t(L,{type:"primary",ghost:"",onClick:u[0]||(u[0]=v=>P()),class:"ml-5"},{default:e(()=>[i("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1})}}});export{_e as default};