(function($){

			
				function PopUp(){
					
					this.typeRequest = "POST";
					this.url = PATH.homepage+"ens_booked/create";
					this.popupOkBtn = $('<input>').addClass('popupOkBtn').attr('type',"button");
					this.popupCancelBtn = $('<input>').addClass('popupCancelBtn').attr('type',"button");
					this.popupContent = $('<div>').addClass('popupContent');
					var self = this;
					this.p = $("<div>").addClass('popup__overlay')
						.append($('<div>').addClass('popup').append(
							$('<a>').attr('href',"#").addClass('popup__close').append('X').unbind('click').click(function() {
								self.p.css('display', 'none')
							}),
							$(this.popupContent),
							$(this.popupOkBtn),
							$(this.popupCancelBtn)
						))
						.unbind('click').click(function(event) {
							e = event || window.event
							if (e.target == this) {
								$(self.p).css('display', 'none')
							}
						});
				
				}
				PopUp.prototype.request =  function(options){
					options = options || {};
					this.url = options.url || this.url;
					var d = $.Deferred();
					var settings = {
						dataType:"json",
						type:this.typeRequest,
						async:true,
						url:this.url,
						data:{},
						error:function(data){alert('Ajax Error')},
						success:function(data){d.resolve(data);},
					};
					
					$.extend(settings, options);
					$.ajax(settings);
					return d.promise();	
				}
				PopUp.prototype.callPopup = function(){
					this.p.css('display', 'block');
					if(!!$(this.p).parents('body').length)
						return;
					$(this.p).appendTo('body');
					
				}
				
				
				PopUp.prototype.createRecord = function(roomId,hour,selectedDate){
					var self = this;
					if(!(!!roomId) || !(!!hour) || !(!!selectedDate)) return;
					var dataInsert = {
						url:PATH.homepage+"ens_booked/create",
						data:{
							'roomId':roomId,
							'hour':hour,
							'selectedDate':selectedDate,
						}
					};

					var insertRecord = function(){
						
						self.request(dataInsert).done(function(res){
							if(!!res.login){
								self.createPopUp(res.login,{
									callbackOk:function(){
										self.loginCheck().done(insertRecord);
									}
								})
							}
							if(!!res.success && !!res.message){
								self.createPopUp(res.message,{needCancel:false})
								self.loadTable($( "#datepicker" ).val());
							}
							if(!(!!res.success) && !!res.message){
								self.createPopUp(res.message,{needCancel:false})
							}
						})
					}
					
					insertRecord();
					
				}
				PopUp.prototype.deleteRecord = function(roomId,hour,selectedDate){
					var self = this;
					if(!(!!roomId) || !(!!hour) || !(!!selectedDate)) return;
					var dataDelete = {
						url:PATH.homepage+"ens_booked/delete",
						data:{
							'roomId':roomId,
							'hour':hour,
							'selectedDate':selectedDate,
						}
					};
					var deleteRecord = function(){
						
						self.request(dataDelete).done(function(res){
							if(!!res.login){
								self.createPopUp(res.login,{
									callbackOk:function(){
										self.loginCheck().done(deleteRecord);
									}
								})
							}
							if(!!res.success && !!res.message){
								self.createPopUp(res.message,{needCancel:false})
								self.loadTable($( "#datepicker" ).val());
							}
							if(!(!!res.success) && !!res.message){
								self.createPopUp(res.message,{needCancel:false})
							}
						})
					}
					deleteRecord();
				}
				PopUp.prototype.loginCheck = function(){
					var d = $.Deferred(),self = this;			
					var loginCheck = function(){
						var data = {
							url:PATH.homepage+"login_check",
							data:{
								_username:$("#popup-form_login").val(),
								_password:$("#popup-form_password").val()
							}
							
						};
						self.request(data).done(function(res){
							if(!(!!res.success)){
								var popupErrMsg = $(self.popupContent).find('.popupErrMsg');
								if(!!popupErrMsg.length){
									$(popupErrMsg).html(res.message);
								}else{
									$(self.popupContent).children('h2').after('<p class="popupErrMsg" style="color:#FF0000">'+res.message+'</p>');
								}
								loginUser($(self.popupContent).html());
							}
							if(!!res.success && !!res.user){
								$('#footer .content').html('Logget in as:'+res.user+'<a href="'+PATH.homepage+'logout">Logout</a>');
								d.resolve();
							}
						})
					}
					var loginUser = function(login){
						self.createPopUp(login,{
							callbackOk:loginCheck
						})
					}
					loginCheck();
					return d.promise();
				}
				
				PopUp.prototype.loadTable = function(selectedDate){
					$(".yui").load(PATH.homepage+"ens_booked/",{'selectedDate':selectedDate})
				}
				PopUp.prototype.createPopUp = function(content,options){
					$(this.popupContent).html(content);
					var settings = {
						okBtn: 'Ok',
						cancelBtn: 'Cancel',
						style:{},
						needOk:true,
						needCancel:true,
						needCall:true,
						callbackOk:function(){},
						callbackClose:function(){},
					}
					$.extend(settings,options);
					var popup = this;
					$(this.popupOkBtn).hide();
					$(this.popupCancelBtn).hide();
					if(!!settings.needOk){
						$(this.popupOkBtn).val(settings.okBtn);
						var okCallback = function() {
							settings.callbackOk();
							popup.p.css('display', 'none')
						}
						$(this.popupOkBtn).unbind('click').click(okCallback).show();
						
						$(popup.p).unbind('keypress').keypress(function(e){
							if (e.which == 13){
								okCallback();
							}
						});
					}
					if(!!settings.needCancel){
						$(this.popupCancelBtn).val(settings.cancelBtn);
					
						$(this.popupCancelBtn).unbind('click').click(function() {
							settings.callbackClose();
							popup.p.css('display', 'none')
						}).show();
					}
					
					if(!!settings.needCall)
						this.callPopup();
					
				}
				function textSort(index,sortedFieldsIndex){
					var elem = $("."+index+" tbody"),sortedFieldsIndex = sortedFieldsIndex || -1;
					var sortElem = $(elem).children('tr').sort(function (a, b){
						var aVal = $(a).attr('roomId')
						var bVal = $(b).attr('roomId')	
						return (aVal < bVal) ? -1*sortedFieldsIndex : (aVal > bVal) ? 1*sortedFieldsIndex : 0;
					});
					textSort.sortedFieldsIndex = -1*sortedFieldsIndex;
					$(elem).empty().append($(sortElem))
				}
				$(function() {
					var myPopUp = new PopUp();
					
					$(document).on('click','.booked',function(){
						var self = this;
						myPopUp.createPopUp(
							'<h2>Booking</h2><p>Do you realy want to remove this booking?</p>',{
							callbackOk:function(){
								myPopUp.deleteRecord($(self).parents('tr:first').attr('roomId'),$(self).attr('hour'),$("#datepicker").val());
							}
						})	
					})
							
					$(document).on('click','.free',function(){
						var self = this;
						var selectedDate = $("#datepicker").val(),
							roomName = $(self).siblings('td[roomName]').attr('roomName').toLowerCase(),
							hour = $(self).attr('hour');
						myPopUp.createPopUp(
							'<h2>Booking '+selectedDate+'</h2><p>Do you realy want to book '+roomName+' for '+hour+'.00-'+(parseInt(hour)+1)+'.00?</p>',{
							callbackOk:function(){
								myPopUp.createRecord($(self).parents('tr:first').attr('roomId'),hour,selectedDate);
							}
						})	
					})
					
					$(document).on('click','.tableItems th[sortRoom]',function(){
						textSort('tableItems',textSort.sortedFieldsIndex)
					});
					
					
					$( "#datepicker" ).datepicker({
						showOn: "button",
						dateFormat: "yy-mm-dd",
						buttonImage: PATH.asset+'/images/calendar.gif',
						buttonImageOnly: true,
						onSelect: function(dateText) {
							myPopUp.loadTable(this.value);
						},
						buttonText: "Select date"
						
					}).datepicker('setDate', '+0d');
							
							
				});
				
			})($)