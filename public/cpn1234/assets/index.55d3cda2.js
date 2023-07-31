import{r as i,b as d,f as m,d as o,w as t,_ as j,F as w,o as c,g as z,u as g,n as E,j as I,k as T,D as R,e as r,t as y,c as D,l as A,p,A as _,s as V,v as L,$ as b}from"./index.92752f3d.js";import{D as U}from"./DataTable.d5e76718.js";import{F as Y}from"./FormOutlined.a5ac2f05.js";const q={key:0,class:"flex items-center"},G=p("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),J={key:1,class:"flex items-center"},K=p("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),M={controls:""},Q=["src"],ae={__name:"index",setup(W){const N={api:e=>_.get("series/list",{params:e}),addAction:e=>{V.push("/series/0")},itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:L,key:"edit",action(e,n){V.push("/series/"+e.id)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:L,key:"delete",action(e,n){_.delete("series/"+e.id).then(s=>{b[s.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:s.data.message})}).finally(()=>{n()})}}],columns:[{title:"Nh\xF3m kh\xE1ch h\xE0ng",key:"customer_group_name"},{title:"T\xEAn",key:"name"},{title:"Danh s\xE1ch Video",key:"video"},{title:"T\xECnh tr\u1EA1ng",key:"status"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(e){return _.post("series/activeList",{items:e,status:"A"}).then(n=>{b[n.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:n.data.message})})}},{title:"T\u1EAFt",action(e){return _.post("series/activeList",{items:e,status:"D"}).then(n=>{b[n.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:n.data.message})})}}]},v=i(!1),x=i(""),f=i(""),B=()=>{v.value=!1,f.value=""},$=e=>{v.value=!0,x.value=e.path_full,f.value=e.name},h=i(!1),k=i(""),F=e=>{h.value=!0,k.value=e.name,u.value=e.videos},P=()=>{h.value=!1,k.value="",u.value=!1},u=i([]),S=i([{title:"T\xEAn video",dataIndex:"name",key:"name",class:"text-left"},{title:"Chi ti\u1EBFt",key:"action"}]);return(e,n)=>{const s=d("a-button"),H=d("a-popconfirm"),O=d("a-table"),C=d("a-modal");return c(),m(w,null,[o(j,null,{default:t(()=>[o(z,null,{default:t(()=>[o(g(U),E(I(N)),{"cellAction[delete]":t(({item:a,actionMethod:l})=>[o(H,{title:"B\u1EA1n mu\u1ED1n x\xF3a s\u1EA3n ph\u1EA9m n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:l},{default:t(()=>[o(s,{type:"text",danger:"",icon:T(g(R)),label:"",outline:!0},null,8,["icon"])]),_:2},1032,["onConfirm"])]),"cellAction[edit]":t(({item:a,actionMethod:l})=>[o(s,{type:"text",icon:T(g(Y)),label:"",outline:!0,onClick:l},null,8,["icon","onClick"])]),"cell[name]":t(({item:a,column:l})=>[r(y(a.name),1)]),"cell[video]":t(({item:a,column:l})=>[o(s,{type:"link",onClick:X=>F(a)},{default:t(()=>[r("Xem chi ti\u1EBFt ("+y(a.videos.length)+")",1)]),_:2},1032,["onClick"])]),"cell[status]":t(({item:a,column:l})=>[a.status=="D"?(c(),m("div",q,[G,r(" T\u1EAFt ")])):(c(),m("div",J,[K,r(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)]),_:1})]),_:1}),o(C,{open:h.value,title:k.value,footer:null,onCancel:P,width:"50%"},{default:t(()=>[u.value.length>0?(c(),D(O,{key:0,dataSource:u.value,columns:S.value},{bodyCell:t(({column:a,record:l})=>[a.key==="name"?(c(),m(w,{key:0},[r(y(l.name),1)],64)):a.key==="action"?(c(),D(s,{key:1,type:"link",onClick:X=>$(l)},{default:t(()=>[r("Xem video")]),_:2},1032,["onClick"])):A("",!0)]),_:1},8,["dataSource","columns"])):A("",!0)]),_:1},8,["open","title"]),o(C,{open:v.value,title:f.value,footer:null,onCancel:B},{default:t(()=>[p("video",M,[p("source",{src:x.value},null,8,Q)])]),_:1},8,["open","title"])],64)}}};export{ae as default};
