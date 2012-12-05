if (typeof(Jubei) == 'undefined') {
    Jb = {};
}
Jb.Form = {
    /**
     * 
     */
    check : function(form){
        var titles = []; // 
        var emptyCount = 0;
        var lastName = ''; // Last element name
        var reg = new RegExp(/required(\d*)/);
        for ( var i = 0, length = form.elements.length ; i < length ; i++) {
            var el = form.elements[i];
            // if the element name is same to last one
            if (el.name == lastName) {
                continue;
            }
            var result = reg.exec(el.className);
            // If class attr has no 'required' phase
            if (result == null) {
                continue;
            }
            var minRequired = (result.length == 2 && result[1].length > 0 ? result[1] : 1);
            lastName = el.name;
            var elType = el.type.toLowerCase()
            // text, textarea, password: If the value length is zero.
            // checkbox, radio: 
            // select, select-multiple: 
            if ((elType == 'text' || elType == 'textarea' || elType == 'password') && el.value.length == 0
                || (elType == 'checkbox' || elType == 'radio') && this.isUnchecked(form, el.name, minRequired)
                || (elType == 'select' || elType == 'select-multiple') && this.isUnselected(el, minRequired)) {
                if (el.title && el.title.length > 0) {
                    // If title attribute exists
                    titles[titles.length] = el.title;
                }
                // try to show a message.
                this.showError(el.name, true);
                emptyCount++;
            } else {
	            this.showError(el.name, false);
            }
        }
        if (emptyCount == 0) {
	        return true;
        } else {
            alert('必須項目を入力してください\n\n' + titles.join("\n"));
            return false;
        }
    },
    /**
     * 
     */
    isUnchecked : function(form, radioName, minRequired){
       var chkCount = 0;
       for (var i = 0, length = form.elements.length ; i < length ; i++) {
           var el = form.elements[i];
           if (el.name == radioName && el.checked) {
                chkCount++;
           }
       }
       return (chkCount <  minRequired);
    },
    /**
     * 
     */
    isUnselected : function(select, minRequired){
        var slCount = 0;
        for (var i = 0, length = select.options.length ; i < length ; i++) {
            var opt = select.options[i];
            if (opt.selected) {
                slCount++;
            }
        }
        return (slCount < minRequired);
    },
    /**
     * Show an error message
     */
    showError : function(elName, visible){
        var block = document.getElementById('err-' + elName);
        if (block == null && elName.match(/\[\]$/)) {
	        block = document.getElementById('err-' + elName.replace(/\[\]$/, ''));
        }
        if (block != null) {
            block.style.display = (visible ? 'block' : 'none');
        }
    }
}
