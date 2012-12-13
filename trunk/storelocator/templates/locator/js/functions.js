/************************************************************************************/
/*********************************** Library ****************************************/
/************************************************************************************/


/**
 * Validate Form
 * @param {string} id
 * @param {object} object 
 */
function jValidateForm(id, elements, erConfig){
	var frmObj = $('#' + id);	
	if(frmObj.length > 0){
		//initialize
		if(typeof(erConfig) == 'undefined'){
			var errorConfig = {
				type: 'layer',	//3 type: layer or showhide or multierror
				customError: 'alertForm' + id
			}
			var erLayer = $('<div id="'+ errorConfig.customError +'"><p class="message"></p></div>').appendTo($(document.body));			
			//create layer
			erLayer.find('.message').css({
				'font-size': '11px',
				'padding': 0
			});
			erLayer.css({
				'padding':  '3px 10px',
				'background': '#BFC457',
				'color': '#ffffff',
				'height': '14px',
				'position': 'absolute',
				'top': -15000
			});
			frmObj.data('alertForm', erLayer);
		}else{
			var errorConfig = erConfig;
			var erLayer = $(errorConfig.customError);
		}
		var showErrorTimeout = null;
		
		//init elements
		function initFormElements(els){
			for(var i=0; i<els.length; i++){												
				var elObj = frmObj.find('[name="'+ els[i].field +'"]');
				if(elObj.length > 0){
					elObj.data('initVal', els[i].init);				
					if(typeof(els[i].init)!='undefined' && els[i].init != ''){
						elObj.val(els[i].init);
						elObj.unbind('focus').bind('focus', function(e){
							var _this = $(this);
							if($.trim(_this.val()) == _this.data('initVal')){
								_this.val('');
							}
						});
						elObj.unbind('blur').bind('blur', function(e){
							var _this = $(this);
							if($.trim(_this.val()) == ''){
								_this.val(_this.data('initVal'));
							}
						});
					}
				}
			}
		}		
		initFormElements(elements);
		
		//add event
		frmObj.unbind('submit').bind('submit', function(e){
			//reset error
			$(errorConfig.customError).addClass('hidden');
			//valid error
			var errorObj = validElements(elements);
			
			if(errorObj.length > 0){				
				if(errorConfig.type == 'layer'){
					showLayer(errorObj[0].element, errorObj[0].message);				
				}else if(errorConfig.type == 'showhide'){
					showHideError(errorObj[0].element, errorObj[0].message);
				}else{
					showElementError(errorObj[0].element, errorObj[0].message, errorObj[0].errEl);
				}
				return false;
			}else{
				$(errorConfig.customError).addClass('hidden');				
				if(typeof(errorConfig.onSubmit)!='undefined'){
					e.preventDefault();					
					e.stopPropagation();
					
					errorConfig.onSubmit();					
				}
			}
		});
		//add event submit
		if(frmObj.find('.btnSubmit, .submit').length > 0){
			frmObj.find('.btnSubmit, .submit').unbind('click').bind('click', function(e){
				e.preventDefault();				
				frmObj.trigger('submit');
			});
		}
		
		function validElements(els){
			var errorEl = [];
			for(var i=0; i<els.length; i++){				
				var msgpos = isValidElement(els[i]);
				var msg = els[i].messages.split('|');
				var err = frmObj.find(errorConfig.customError)[i];
				
				if(msgpos != -1){	//error					
					if(errorConfig.type == 'multierror'){
						errorEl.push({
							'element': els[i].field, 
							'message': msg[msgpos],
							'errEl': $(err)
						});
					}else{
						errorEl.push({
							'element': els[i].field, 
							'message': msg[msgpos]
						});
					}
					break;
				}
			}			
			return errorEl;
		}
		function isValidElement(el){				
			var pos_error = -1;
			var elObj = frmObj.find('[name="'+ el.field +'"]');
			var valid = el.valid.split('|');
			for(i=0; i<valid.length; i++){
				if(valid[i] == 'required'){
					if(elObj[0].tagName == 'SELECT'){
						if(jQuery.trim(elObj.val()) == 0){							
							pos_error = i
							break;
						}
					}else if(elObj[0].tagName == 'INPUT' || elObj[0].tagName == 'TEXTAREA'){
						if(elObj.attr('type') == 'radio'){
							var _er = true;
							elObj.each(function(ind, elo){
								if(elo.checked){
									_er = false;
								}
							});
							if(_er){
								pos_error = i;
								break;
							}
						}else if(elObj.attr('type') == 'checkbox'){
							if(!elObj[0].checked){
								pos_error = i;
								break;
							}
						}else{
							if(jQuery.trim(elObj.val()) == '' || jQuery.trim(elObj.val()) == elObj.data('initVal')){							
								pos_error = i;
								break;
							}					
						}
					}
				}
				if(valid[i] == 'email'){
					if(!isEmail(jQuery.trim(elObj.val()))){
						pos_error = i;
						break;
					}
				}
				if(valid[i] == 'number'){
					if(!isNumber(jQuery.trim(elObj.val()))){
						pos_error = i;
						break;
					}
				}
				if(valid[i] == 'url'){
					if(!isUrl(jQuery.trim(elObj.val()))){
						pos_error = i;
						break;
					}
				}
			}
			return pos_error;
		}
		function isEmail(value){
			var re = new RegExp("^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]{2,4}$");
			return (value.search(re) != -1);
		}
		function isNumber(value){
			var re = /^[-+]?\d*\.?\d+(?:[eE][-+]?\d+)?$/;
			return re.test(value);			
		}
		function isUrl(value){
			var re = /(((https?)|(ftp)):\/\/([\-\w]+\.)+\w{2,3}(\/[%\-\w]+(\.\w{2,})?)*(([\w\-\.\?\\\/+@&#;`~=%!]*)(\.\w{2,})?)*\/?)/i;
			return re.test(value);			
		}
		function showLayer(el, msg){			
			var coords = frmObj.find('[name="'+ el +'"]').offset();			
			var layer = frmObj.data('alertForm').removeClass('hidden');
			layer.find('.message').text(msg);
			layer.css({
				'top': coords.top + 20,
				'left': coords.left
			});
			showErrorTimeout = clearTimeout(showErrorTimeout);
			showErrorTimeout = setTimeout(function(){
				layer.css({
					'top': -15000
				});					
			}, 3000);
			if(frmObj.find('[name='+el+']').length > 0){
				frmObj.find('[name='+el+']')[0].focus();			
			}
		}
		function showHideError(el, msg){
			var erEl = $(errorConfig.customError);
			erEl.text(msg);
			
			erEl.removeClass('hidden');
			showErrorTimeout = clearTimeout(showErrorTimeout);
			showErrorTimeout = setTimeout(function(){
				erEl.addClass('hidden');			
			}, 5000);
			if(frmObj.find('[name='+el+']').length > 0){
				frmObj.find('[name='+el+']')[0].focus();			
			}
		}
		function showElementError(el, msg, err){
			if(err.find('.message').length > 0){
				err.find('.message').text(msg);
			}
			err.removeClass('hidden');
			if(frmObj.find('[name='+el+']').length > 0){
				frmObj.find('[name='+el+']')[0].focus();			
			}
		}
	}
}

/**
 * show Show Popup Layer
 * @param {string} id	  
 */
 function showPopupLayer(id, keepmask){
	var el = $(id);
	if(el.length == 0 ) return;	
	
	showHidemaskLayer(true);
	
	$(el).css({
		'position': 'absolute',
		'zIndex': 9990,
		'display': 'block'
	});
	
	if(id == '#alertLayer' || id == '#confirmLayer' || id == '#messageLayer'){
		$(el).css('zIndex', 9999);
	}
	
	var dimensions = windowDimensions();	
	var _top = (dimensions.height - $(el).innerHeight()) / 2 + $(window).scrollTop();
	var _left = (dimensions.width - $(el).innerWidth()) / 2;
	if(_top < 10) _top = 10;
	$(el).css({			
		'left': _left,
		'top': _top
	});		
	$(window).unbind('resize').bind('resize', function(){
		dimensions = windowDimensions();
		_top = (dimensions.height - $(el).innerHeight()) / 2 + $(window).scrollTop();
		_left = (dimensions.width - $(el).innerWidth()) / 2;	
		$(el).css({			
			'left': _left,
			'top': _top
		});				
	});	
	el.find('.close, .btnClose').unbind('click').bind('click', function(){		
		if(keepmask == 'keepmask'){
			hideLayer(id, keepmask);
		}else{
			hideLayer(id);		
		}
		
		$(window).unbind();
		$(document).unbind();
	});
	if(id == '#alertLayer'){
		var args = arguments;
		if(args[2] && args[2] != ''){
			$(id).find('.message').text(args[2]);
		}
		//add btnOK
		el.find('.btnOK').unbind().bind('click', function(e){
			e.preventDefault();			
			if(keepmask == 'keepmask'){
				hideLayer(id, keepmask);
			}else{
				hideLayer(id);		
			}
		});
	}
	if(id == '#confirmLayer'){
		var args = arguments;
		//add btnYes
		el.find('.btnYes').unbind().bind('click', function(e){
			e.preventDefault();
			if(typeof(args[2]) == 'function'){
				args[2]();
			}
			if(keepmask == 'keepmask'){
				hideLayer(id, keepmask);
			}else{
				hideLayer(id);		
			}
		});
		el.find('.btnNo').unbind().bind('click', function(e){
			e.preventDefault();
			if(typeof(args[3]) == 'function'){
				args[3]();
			}
			if(keepmask == 'keepmask'){
				hideLayer(id, keepmask);
			}else{
				hideLayer(id);		
			}
		});
	}
	if(id == '#messageLayer'){
		$(id).find('p').text(arguments[2]);		
	}
}
/**
 * show Hide Popup Layer
 * @param {string} id	  
 */
function hideLayer(id, keepmask){	
	if(keepmask == 'keepmask'){
		
	}else{
		showHidemaskLayer(false);
	}
	$(id).css({
		'left': -15000
	});	
	if(id == '#importLanguageLayer'){
		$('#frmImportLanguage')[0].reset();
	}
	if(id == '#playListUnitsLayer'){		
		if($(id).data('savedsts')){
			window.location.reload();
		}
	}
}
/**
 * show/Hide maskLayer
 * @param {Boolean} flag 
 */
function showHidemaskLayer(flag){		
	if($('#maskLayer').length == 0) {
		$(document.body).append('<div id="maskLayer"></div>');
		var maskLayer = $('#maskLayer').hide();		
	} else {		
		var maskLayer = $('#maskLayer');
	}
	if(flag) {		
		maskLayer.show().css({
			'position': 'fixed',
			'visibility': 'visible',
			'backgroundColor': '#000000',			
			'zIndex': 9000,
			'opacity': 0.5,
			'width': '100%',
			'height': '100%',
			'top': '0',
			'left': '0'
		});
	} else {
		maskLayer.hide();
	}
}


function windowDimensions() {
	var dimensions = {width: 0, height: 0};
	dimensions.width = $(window).width();
	dimensions.height = $(window).height();	
	return dimensions;
};

function jCustomSelect(cont) {
    var selectors = $('.customSelect');
    if(cont){
		selectors = cont.find('.customSelect');
	}
	if (selectors.length > 0) {
        selectors.each(function(index,selector) {
            runCustomSelect(selector);
        });
    }
	
	function runCustomSelect(sel) {		
		var selectorObj = $(sel);	
		selectorObj.csValue = selectorObj.find('.csValue')[0];		
		selectorObj.csText = selectorObj.find('.csText')[0];		
		if(!selectorObj.find('select')[0]) return;
		
		var strLi = '';
		selectorObj.find('select option').each(function(index, opt){
			if(index==0){
				strLi = '<li class="first" id="' + $(opt).val() + '">'+ $(opt).html() +'</li>';				
			}else{
				strLi += '<li id="' + $(opt).val() + '">'+ $(opt).html() +'</li>';
			}
		});
		selectorObj.csLayer = $('<div class="optionLayer hide"><div class="csLayer"><ul>' + strLi + '</ul></div></div>');		
		selectorObj.append(selectorObj.csLayer);
		selectorObj.find('.icon').click(function(e){
			e.preventDefault();
			
			if(selectorObj.csLayer.find('li').length > 4 ){
				var _height = Math.min(116, ((selectorObj.csLayer.find('li').length) * 30));				
			}else if(selectorObj.csLayer.find('li').length == 4){
				var _height = 116;
			}else{
				var _height = (selectorObj.csLayer.find('li').length * 29) - 1;
			}
			var _ul_height = (selectorObj.csLayer.find('li').length * 29) - 1;
			
			var coords = selectorObj.position();
			selectorObj.csLayer.removeClass('hide').addClass('smScrollContent').css({
				'z-index': 9999,
				'overflow': 'hidden',
				'height': _height,
				'position': 'absolute',
				'top': selectorObj.height(),
				'left': 0
			});
			selectorObj.csLayer.find(':first').css('height', _height - 2);
			selectorObj.csLayer.find(':first').find(':first').css('height', _ul_height);
			//scroller
			// if(selectorObj.find('.smScroller').length == 0){
				// Util.JScroller(selectorObj.find('.smScrollContent'));				
			// }
			// if(selectorObj.csLayer.next()){
				// selectorObj.csLayer.next().css({
					// 'z-index': 9999,
					// 'position': 'absolute',
					// 'top': selectorObj.csLayer.position().top,
					// 'left': selectorObj.csLayer.width()
				// });
			// }
		});
		
		$(document).mousedown(function(e){				
			if(!$(e.target).hasClass('optionLayer') && $(e.target).parents('.optionLayer').length == 0 /*&& !$(e.target).hasClass('smScroller') && $(e.target).parents('.smScroller').length == 0*/){
				close();
			}
		});
		
		selectorObj.csLayer.find('li').each(function (ind, li) {
			$(li).css('cursor', 'pointer');
			$(li).die().click(function(e){
				e.preventDefault();
				selectorObj.csValue.value = $(li).attr('id');
				$(selectorObj.csText).find(':first').text($(li).text());				
				//callback
				callback();
				//end callback	
				close();
			});
		});
		function callback(){
		}
		function close(){
			selectorObj.csLayer.css('top', -15000);
		}
	}	
}

function jCustomRadiobox(cont){
	var arrChk = $('.rdunchecked');
	if(cont){
		arrChk = $(cont).find('.rdunchecked');
	}
	var prev = null;
	if(arrChk.length > 0){
		arrChk.each(function(index, rad){			
			if($(rad).hasClass('rdchecked')){
				prev = $(rad);
			}			
			$(rad).unbind('click').bind('click', function(e){
				e.preventDefault();				
				if(prev == null){
					prev = $(this);
					$(this).addClass('rdchecked');
					if($(this).find(':first').length > 0){
						$(this).find(':first').checked = true;
					}
				}else{
					prev.removeClass('rdchecked');
					if(prev.find(':first').length > 0){
						prev.find(':first').checked = false;
					}
					$(this).addClass('rdchecked');
					if($(this).find(':first').length > 0){
						$(this).find(':first').checked = true;
					}
					prev = $(this);
				}
				
				if($(this).find(':first').attr('id') == 'rdrdNewSurvey'){
					$('#slSurveyTemplate').addClass('hidden');
				}else if($(this).find(':first').attr('id') == 'rdrdCopySurvey'){
					$('#slSurveyTemplate').removeClass('hidden');					
				}
			});
		});
	}
}


function jCustomCheckbox(cont){
	var arrChk = $('.unchecked');
	if(cont){
		arrChk = $(cont).find('.unchecked');
	}
	var count = 0;
	var chkAll;
	if(arrChk.length > 0){
		arrChk.each(function(index, chk){
			if($(chk).hasClass('checked'))
				count++;
			if($(chk).hasClass('chkAll'))
				chkAll = $(chk);
			$(chk).unbind('click').bind('click', function(e){
				e.preventDefault();
				if($(this).hasClass('chkAll')){
					if($(this).hasClass('checked')){
						arrChk.removeClass('checked');
						if($(this).find(':first'))
							$(this).find(':first').checked = false;
					}else{
						arrChk.addClass('checked');
						if($(this).find(':first'))
							$(this).find(':first').checked = true;
					}
				}else{
					if($(this).hasClass('checked')){
						$(this).removeClass('checked');
						if($(this).find(':first'))
							$(this).find(':first').checked = false;
						
					}else{
						$(this).addClass('checked');
						if($(this).find(':first'))
							$(this).find(':first').checked = true;
						
					}					
				}
			});
		});
		if(count == arrChk.length-1 && arrChk.length >= 2){
			if(chkAll && chkAll[0]){
				chkAll.addClass('checked');	
				if(chkAll.find(':first'))
					chkAll.find(':first').checked = true;
			}			
		}
	}
}

function jCustomUpload(action){	
	var btnBrowse = $('.jQUpload');	
	if(btnBrowse.length > 0){
		btnBrowse.each(function(pos, btn){			
			if($(btn).parent().find('.divUpload').length > 0){
				var divInput = $(btn).parent().find('.divUpload');
			}else{
				$(btn).parent().append('<div class="divUpload"><input type="file" name="fileUpload"/></div>');			
				var divInput = $(btn).parent().find('.divUpload');
			}			
			// var coords = $(btn).position();
			var coords = $(btn).parent().find('input[type="text"]').position();			
			divInput.css({
				'overflow': 'hidden',				
				'width': $(btn).parent().outerWidth(),
				'height': $(btn).outerHeight(),
				'position': 'absolute',
				'top': coords.top,
				'left': coords.left				
			});
			divInput.find(':first').css({
				'font-size': '50px',
				'position': 'absolute',					
				'height': $(btn).outerHeight(),
				'opacity': 0.01,
				'top': 0,
				'right': 0,
				'margin': 0
			}).bind('change', function(){
				$(btn).parent().find('input[type="text"]').val($(this).val());
				if($(btn).hasClass('frmImportLanguage')){
					showPopupLayer('#confirmLayer','keepmask',function(){
						$('#frmImportLanguage').attr('action', action);						
						$('#frmImportLanguage').submit();
						$('#frmImportLanguage')[0].reset();
						
						showPopupLayer('#progressLayer', 'keepmask');
					});
				}
				if($(btn).hasClass('frmImportUnit')){
					showPopupLayer('#confirmLayer','keepmask',function(){
						$('#frmImportUnit').attr('action', action);						
						$('#frmImportUnit').submit();
						$('#frmImportUnit')[0].reset();
						
						showPopupLayer('#progressLayer', 'keepmask');
					});
				}
			});			
			$(btn).data('divInput',divInput);			
			$(btn).after(divInput);
		});
	}
}
