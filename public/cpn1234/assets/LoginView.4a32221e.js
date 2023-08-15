import{j as h,ag as g,r as n,e as f,a as e,l as o,w as a,ah as b,o as w,C as u,a7 as i}from"./index.79b85385.js";const x={class:"flex flex-col md:flex-row h-screen items-center"},_=e("div",{class:"bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen"},[e("img",{src:"https://source.unsplash.com/random",alt:"",class:"w-full h-full object-cover"})],-1),v={class:"bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center"},y={class:"w-full h-100"},k=e("h1",{class:"text-xl md:text-2xl font-bold leading-tight mt-12"},"Log in to your account",-1),L=e("label",{class:"block text-gray-700"},"Username",-1),P=e("label",{class:"block text-gray-700"},"Password",-1),V=e("div",{class:"text-right mt-2"},[e("a",{href:"#",class:"text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700"},"Forgot Password?")],-1),B=e("button",{type:"submit",class:"w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6"},"Log In",-1),C=e("hr",{class:"my-6 border-gray-300 w-full"},null,-1),M=e("button",{type:"button",class:"w-full block bg-white hover:bg-gray-100 focus:bg-gray-100 text-gray-900 font-semibold rounded-lg px-4 py-3 border border-gray-300"},[e("div",{class:"flex items-center justify-center"},[e("svg",{xmlns:"http://www.w3.org/2000/svg","xmlns:xlink":"http://www.w3.org/1999/xlink",class:"w-6 h-6",viewBox:"0 0 48 48"},[e("defs",null,[e("path",{id:"a",d:"M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"})]),e("clipPath",{id:"b"},[e("use",{"xlink:href":"#a",overflow:"visible"})]),e("path",{"clip-path":"url(#b)",fill:"#FBBC05",d:"M0 37V11l17 13z"}),e("path",{"clip-path":"url(#b)",fill:"#EA4335",d:"M0 11l17 13 7-6.1L48 14V0H0z"}),e("path",{"clip-path":"url(#b)",fill:"#34A853",d:"M0 37l30-23 7.9 1L48 0v48H0z"}),e("path",{"clip-path":"url(#b)",fill:"#4285F4",d:"M48 48L17 24l-4-3 35-10z"})]),e("span",{class:"ml-4"}," Log in with Google")])],-1),q={__name:"LoginView",setup(z){const t=h({username:"",password:"",remember:!0}),c=g(),d=async()=>{try{await b().login(t.value),c.push("/")}catch{alert("wrong!")}};return(m,s)=>{const r=n("a-input-item"),p=n("a-form");return w(),f("section",x,[_,e("div",v,[e("div",y,[k,o(p,{onSubmit:d,model:t.value,class:"mt-6",action:"#",method:"POST"},{default:a(()=>[o(r,{name:"username",rules:[{required:!0,message:"Please input your username!"}],label:""},{default:a(()=>[L,u(e("input",{"onUpdate:modelValue":s[0]||(s[0]=l=>t.value.username=l),name:"",placeholder:"Username",class:"w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none",autofocus:"",autocomplete:"",required:""},null,512),[[i,t.value.username]])]),_:1}),o(r,{rules:[{required:!0,message:"Please input your username!"}],name:"password",class:"mt-4"},{default:a(()=>[P,u(e("input",{"onUpdate:modelValue":s[1]||(s[1]=l=>t.value.password=l),type:"password",name:"",placeholder:"Enter Password",minlength:"6",class:"w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none",required:""},null,512),[[i,t.value.password]])]),_:1}),V,B]),_:1},8,["model"]),C,M])])])}}};export{q as default};
