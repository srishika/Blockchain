import React, { Component } from 'react';
import web3 from './web3';


import ipfs from './ipfs';
import storehash from './storehash';
import { Button } from 'reactstrap';

class App extends Component {
  state = {
          ipfsHash:null,
          buffer:'',      
          ethAddress:'',      
          transactionHash:'',      
          txReceipt: ''    
        };
  //Take file input from user
  captureFile =(event) => {        
    event.stopPropagation()        
    event.preventDefault()        
    const file = event.target.files[0]        
    let reader = new window.FileReader()        
    reader.readAsArrayBuffer(file)        
    reader.onloadend = () => this.convertToBuffer(reader)      };
  //Convert the file to buffer to store on IPFS 
  convertToBuffer = async(reader) => {     
    const buffer = await Buffer.from(reader.result);      //set this buffer-using es6 syntax        
    this.setState({buffer});    
  };
  //ES6 async 
  functiononClick = async () => {try{        
    this.setState({blockNumber:"waiting.."
  });        
  this.setState({gasUsed:"waiting..."});
  await web3.eth.getTransactionReceipt(this.state.transactionHash, (err, txReceipt)=>{          
    console.log(err,txReceipt);          
    this.setState({txReceipt});        
  });      
  }catch(error){      
    console.log(error);    
  }}
  onClick() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        // document.getElementById("demo").innerHTML = this.responseText;
        console.log(this);
        window.open(this.responseURL);
        }
    };
    console.log(document.getElementById("filehash").value)
    xhttp.open("GET", "https://ipfs.io/ipfs/"+document.getElementById("filehash").value, true);
    xhttp.send();
}
  onSubmit = async (event) => {      
    event.preventDefault();
  //bring in user's metamask account address      
    const accounts = await web3.eth.getAccounts();    //obtain contract address from storehash.js      
    const ethAddress= await storehash.options.address;      
    this.setState({ethAddress});    //save document to IPFS,return its hash#, and set hash# to state      
    await ipfs.add(this.state.buffer, (err, ipfsHash) => {        
      console.log(err,ipfsHash);        //setState by setting ipfsHash to ipfsHash[0].hash        
      this.setState({ ipfsHash:ipfsHash[0].hash 
      });        // call Ethereum contract method "sendHash" and .send IPFS hash to etheruem contract        //return the transaction hash from the ethereum contract        
      
      storehash.methods.sendHash(this.state.ipfsHash).send({          
        from: accounts[0]        
      }, (error, transactionHash) => {          
        console.log(transactionHash);          
        this.setState({transactionHash});        
      });      
    })    
  };
  render() {
  return (  
 
  <div className="App"
    style={{border: '2px solid blue',
    position: 'absolute',

    padding:'20px',
    width: '760px',
    height:'550px',
    top: '20%',
    left:'33%',
    bottom:'-50%', 
    margin: '-90px 0 0 -100px',
    background: 'lightblue'}}>        
       
  
  <hr/><grid>          
    <h3 className="classname-color"  >       Choose file to send to IPFS </h3>
              <form onSubmit={this.onSubmit}>            
              <input type = "file" onChange = {this.captureFile}/> 
                          <Button bsStyle="primary" color="primary" type="submit">Send it</Button>
              </form><hr/> 
              <Button color="primary" onClick = {this.onClick}> Get Transaction Receipt </Button> <hr/>  
              <input id='filehash' type = 'text'></input>
           
              <br></br>
            <table bordered responsive>      
    
            <thead>                  
              <tr>                    
              <th >Tx Receipt Category</th>                    
              <th> </th>                    
              <th>Values</th>                  
              </tr>                
            </thead>
  <tbody>
              <tr>                    
                <td>IPFS Hash stored on Ethereum</td>                    
                <td> : </td>                    
                <td >{this.state.ipfsHash}</td>
              </tr>                  
              
              <tr>                    
                <td>Ethereum Contract Address</td>                    
                <td> : </td>                    
                <td>{this.state.ethAddress}</td>                  
              </tr>                  
              
              <tr>                    
                <td>Tx # </td>                    
                <td> : </td>                    
                <td>{this.state.transactionHash}</td>                  
              </tr>                
  </tbody>            
  </table>        
  </grid>     
  </div> 

  );    
}}export default App;

//  style={{border: '2px solid white',width:'300px'}}