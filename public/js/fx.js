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
    },
    i(dataobj){
        let dataform = new FormData();
        let datakeys = Object.keys(dataobj);
        for (let datai = 0; datai < datakeys.length; datai++){
            dataform.append(datakeys[datai], dataobj[datakeys[datai]]);
        }
        return dataform;
    }
};

const srtz = function (objz,sortby,direct='desc'){
    switch (direct){
        case "asc":
            return objz.sort(function (sone,stwo) {
                if (sone[sortby] < stwo[sortby]){
                    return 1;
                }else if (sone[sortby] > stwo[sortby]){
                    return -1;
                }else{
                    return 0;
                }
            });
            break;
        case "desc":
            return objz.sort(function (sone,stwo) {
                if (sone[sortby] > stwo[sortby]){
                    return 1;
                }else if (sone[sortby] < stwo[sortby]){
                    return -1;
                }else{
                    return 0;
                }
            });
            break;
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
let $_i = [];
let $_c = {
    config:""
};
Object.defineProperty(Object.prototype,"watch",{
    writable:true,
    enumerable:false,
    configurable:true,
    value:function (prop, handler){
        var oldval = this[prop],
            newval = oldval,
            getter = function () {
                return newval;
            },
            setter = function (val) {
                oldval = newval;
                return newval = handler.call(this, prop, oldval, val);
            };
        if (delete this[prop]) { // can't watch constants
            Object.defineProperty(this, prop, {
                get: getter
                , set: setter
                , enumerable: true
                , configurable: true
            });
        }
    }
});

const a_a = {
    date:function (date, format='general'){
        let dmy = date.split("-");
        switch (format){
            case "general":
                return numeral(dmy[2]).format("00") + "/" + numeral(dmy[1]).format("00") + "/" + dmy[0];
                break;
            default:
                return numeral(dmy[2]).format("00") + "-" + this.month[parseInt(dmy[1])] + "-" + dmy[0];
        }
    },
    month:{
        1:"មករា",
        2:"កុម្ភៈ",
        3:"មីនា",
        4:"មេសា",
        5:"ឧសភា",
        6:"មិថុនា",
        7:"កក្កដា",
        8:"សីហា",
        9:"កញ្ញា",
        10:"តុលា",
        11:"វិច្ឆិកា",
        12:"ធ្នូរ",
    }
}
