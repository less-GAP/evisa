import{r as m,b as _,f as p,d as n,w as t,_ as T,F as N,o as v,g as V,u as f,n as B,j as F,k,D as $,e as i,t as P,p as r,A as c,s as b,v as x,$ as h}from"./index.92752f3d.js";import{D as H}from"./DataTable.d5e76718.js";import{F as L}from"./FormOutlined.a5ac2f05.js";const O={key:0,class:"flex items-center"},S=r("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),j={key:1,class:"flex items-center"},z=r("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),E={controls:""},R=["src"],I={__name:"index",setup(U){const d=m(!1),g=m(""),u=m(""),y=()=>{d.value=!1,u.value=""},C=e=>{console.log(e),g.value=e.path_full,d.value=!0,u.value=e.name},w={api:e=>c.get("video/list",{params:e}),addAction:e=>{b.push("/videos/0")},itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:x,key:"edit",action(e,o){b.push("/videos/"+e.id)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:x,key:"delete",action(e,o){c.delete("video/"+e.id).then(s=>{h[s.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:s.data.message})}).finally(()=>{o()})}}],columns:[{title:"Video",key:"video"},{title:"Name",key:"name"},{title:"Status",key:"status"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(e){return c.post("video/activeList",{items:e,status:"A"}).then(o=>{h[o.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:o.data.message})})}},{title:"T\u1EAFt",action(e){return c.post("video/activeList",{items:e,status:"D"}).then(o=>{h[o.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:o.data.message})})}}]};return(e,o)=>{const s=_("a-button"),A=_("a-popconfirm"),D=_("a-modal");return v(),p(N,null,[n(T,null,{default:t(()=>[n(V,null,{default:t(()=>[n(f(H),B(F(w)),{"cellAction[delete]":t(({item:a,actionMethod:l})=>[n(A,{title:"B\u1EA1n mu\u1ED1n x\xF3a s\u1EA3n ph\u1EA9m n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:l},{default:t(()=>[n(s,{type:"text",danger:"",icon:k(f($)),label:"",outline:!0},null,8,["icon"])]),_:2},1032,["onConfirm"])]),"cellAction[edit]":t(({item:a,actionMethod:l})=>[n(s,{type:"text",icon:k(f(L)),label:"",outline:!0,onClick:l},null,8,["icon","onClick"])]),"cell[video]":t(({item:a,column:l})=>[n(s,{type:"link",onClick:X=>C(a)},{default:t(()=>[i("Xem video")]),_:2},1032,["onClick"])]),"cell[name]":t(({item:a,column:l})=>[i(P(a.name),1)]),"cell[status]":t(({item:a,column:l})=>[a.status=="D"?(v(),p("div",O,[S,i(" T\u1EAFt ")])):(v(),p("div",j,[z,i(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)]),_:1})]),_:1}),n(D,{open:d.value,title:u.value,footer:null,onCancel:y},{default:t(()=>[r("video",E,[r("source",{src:g.value},null,8,R)])]),_:1},8,["open","title"])],64)}}};export{I as default};
