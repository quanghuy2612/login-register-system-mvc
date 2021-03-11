// Đối tượng
function Validator(options) {

    function getParent(element, selector) {
        while(element.parentNode) {
            if (element.parentNode.matches(selector)) {
                return element.parentNode;
            }
            element=element.parentNode;
        }
    }

    var selectorRules={};

    // hàm thực hiện validate
    function Validate(inputElememt, rule) {
        var errorElement=getParent(inputElememt, options.formGroupSelector).querySelector(options.errorSelector);
        var errorMessage;

        // Lấy ra các rules của selector
        var rules=selectorRules[rule.selector];

        // Lặp qua từng rule và kiểm tra
        for (var i=0;i<rules.length;i++) {
            switch(inputElememt.type) {
                case "radio":
                case "checkbox":
                    errorMessage=rules[i](
                        formElememt.querySelector(`${rule.selector}:checked`)
                    );
                    break;
                default: 
                    errorMessage=rules[i](inputElememt.value);
            }
            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText=errorMessage;
            getParent(inputElememt, options.formGroupSelector).classList.add('invalid');
        }
        else {
            errorElement.innerText='';
            getParent(inputElememt, options.formGroupSelector).classList.remove('invalid');
        }

        return Boolean(errorMessage);
    }



    // lấy element form cần validate
    var formElememt=document.querySelector(options.form);
    if (formElememt) {

        // Khi submit form
        formElememt.onsubmit=function(e) {
            e.preventDefault();
            var isFormValid=true;

            // Lặp qua từng rules và validate
            options.rules.forEach(function(rule) {
                var inputElememt=formElememt.querySelector(rule.selector);
                var isValid=Validate(inputElememt, rule);
                if (isValid) {
                    isFormValid=false;
                }
            });

            if (isFormValid) {
                // Trường hợp submit với hành vi mặc định
                formElememt.submit();
            }
        }
        

        // Lặp lại mỗi rule và xử lý lắng nghe sự kiện (blur, input,...)
        options.rules.forEach(function(rule) {

            // Lưu lại các rules cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            }
            else {
                selectorRules[rule.selector]=[rule.test];
            }

            var inputElements=formElememt.querySelectorAll(rule.selector);
            
            for (var i=0;i<inputElements.length;i++) {
                if (inputElements[i]) {

                    // xử lý trường hợp blur khỏi input
                    inputElements[i].onblur=function(e) {
                        Validate(e.target, rule);
                    }
    
                    // xử lý khi người dùng nhập vào input
                    inputElements[i].oninput=function(e) {
                        getParent(e.target, options.formGroupSelector).classList.remove('invalid');
                        getParent(e.target, options.formGroupSelector).querySelector('.form-message').innerText='';
                    }
                }
            }
        })
    }
}

// Định nghĩa rules
Validator.isRequired=function(selector) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : "Vui lòng nhập trường này";
        }
    };
}

Validator.isSame=function(selector, arrUsername) {
    return {
        selector: selector,
        test: function(value) {
            var result=arrUsername.find(function(username) {
                return username===value;
            });

            return result ? "Vui lòng chọn username khác" : undefined;
        }
    }
}

Validator.minLength=function(selector, min) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    };
}

Validator.isConfirmed=function(selector, getConfirmValue) {
    return {
        selector: selector,
        test: function(value) {
            return value===getConfirmValue() ? undefined : "Giá trị nhập vào không khớp";
        }
    }
}