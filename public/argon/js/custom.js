$(document).ready(function() {
    $('.js-select').select2({
        language: "pl"
    });
	
	
	var Main = function() {

		var self = this;
		
		self.dom = $('body');
	
		self.class = {
			item: 'js-invoice-item',
		}

		self.el = {
			content: self.dom.find('.js-invoice-content'),
			item: self.dom.find('.js-invoice-item'),
			btnAdd: self.dom.find('.js-invoice-btn-add'),
			btnRemove: self.dom.find('.js-invoice-btn-remove'),
		}

		self.item = self.el.item.clone();

		self.el.item.remove();	
		
		self.Init();
		
	};
	
	
	Main.prototype.Init = function() {
	
	 var self = this;
		
		self.el.btnAdd.on('click', function() {
        
		console.log('add btn');
			
        var content = self.item.clone();
			content.appendTo(self.el.content);
			self.InitRemove();
		});

	};

	Main.prototype.InitRemove = function() {
	
		var self = this;
		
		self.dom.on('click', '.js-invoice-btn-remove', function() {
			
			console.log('remove');
			
			$(this).closest('.' + self.class.item).remove();
		});

	};
	
	
	var app = new Main();
	
});