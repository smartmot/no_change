const f = {
    d(form){
        return new FormData(form);
    },
    f(form){
        var formdata;
        $(form).submit(function (event){
            event.preventDefault();
            formdata = new FormData(this);
        });
        $(form).submit();
        return formdata;
    },
    s(obs={}){
        var formdataz = new FormData();
        for(var i=0;i<Object.keys(obs).length;i++){
            formdataz.append(Object.keys(obs)[i], obs[Object.keys(obs)[i]]);
        }
        return formdataz;
    },
    x(){
        return new XMLHttpRequest();
    },
    r(fn,options){
        const req = this.x();
        if (!options.t){
            req.responseType = "text";
        }else{
            req.responseType = options.t;
        }
        req.onreadystatechange = function (){
            if (req.readyState === 4){
                if (fn.d){
                    fn.d(req.response);
                }
            }else{
                if (fn.e){
                    fn.e(req.readyState,req.responseText,req.response);
                }
            }
        }
        if (fn.p){
            req.upload.onprogress = function (status) {
                let progress = (status.loaded/status.total)*100;
                fn.p(status,progress,req);
            }
        }
        if (fn.ps){
            req.onprogress = function () {
                fn.ps();
            }
        }
        if (fn.r){
            fn.r(req);
        }
        req.open(options.m,options.target, true);
        req.send(options.x);
    }
};
const img = {
    load(src, fn){
        let image = new Image();
        image.src = src;
        image.onload = function () {
            fn(image);
        };
    },
};

const $f = {
    x(ele,oncrop,option={ratio:(16/9)}){
        return new _$(ele,{
            aspectRatio:option.ratio,
            zoomable:true,
            dragMode:"move",
            viewMode:1,
            cropBoxResizable:false,
            cropBoxMovable:false,
            minCropBoxWidth:30,
            responsive:true,
            guides:false,
            movable:true,
            highlight:true,
            crop(data){
                cdata = {
                    width:data.detail.width,
                    height:data.detail.height,
                    x:data.detail.x,
                    y:data.detail.y,
                    r:data.detail.rotate,
                };
                oncrop(cdata);
            }
        });
    }
}
const _e = {
    n(name,index=0){
        return document.getElementsByName(name)[index];
    }
}
