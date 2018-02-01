import  Errors from './Errors';
class Form{
	constructor(data){

		this.originalData=data;

		for(let field in data){
			this[field] = data[field];
		}
        this.errors = new Errors()
	}

	fill(data){
		for (let field in data){
			this[field]=data[field];
		}
	}

	reset(){
		for(let field in this.originalData){
			this[field]='';
		}
	}

	data(){
		let data = Object.assign({},this);
		delete data.errors;
		delete data.originalData;
		return data;	
	}

	post(url){
		return this.submit('post',url);
	}

	submit(requestType,url){
            return new Promise((resolve,reject) => {
            	axios[requestType](url,this.data())
            	.then( response => {
            		this.onSuccess(response.data);
            		resolve(response.data);
            	})
            	.catch( error => {
            		this.onFail(error.response.data.errors);
            		reject(error.response.data);
            	})
            });
	}

	onSuccess(data){
        	this.errors.clear();
	}

	onFail(errors){
		this.errors.record(errors);
	}
}

export default Form;