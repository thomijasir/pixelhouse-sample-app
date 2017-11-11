import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Twitpost extends Component {

    constructor(props){
        super(props);
        // Inisialasisasi
        this.state = {
            newTweet:{
                user_id: '',
                tweet:'',
            }
        }
        // Bidding Method with this
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
    }

    handleInput(key, e) {
        /*Duplicating and updating the state */
        var state = Object.assign({}, this.state.newTweet);
        state[key] = e.target.value;
        this.setState({newTweet: state });
        console.log(state);
    }

    handleSubmit(e) {
        //preventDefault prevents page reload
        e.preventDefault();
        /*A call back to the onAdd props. The current
         *state is passed as a param
         */
        /*this.props.onAdd(this.state.newTweet);*/
        this.handleAddTweet(this.state.newTweet)
    }

    handleAddTweet(tweetData) {
        console.log('addTweete');
        console.log(tweetData.tweet);

        fetch( 'api/tweet/add/', {
            method:'post',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(tweetData)
        })
            .then(response => {
                return response.json();
            })
            .then( data => {
                //update the state of products and currentProduct
                this.setState((prevState)=> ({
                    tweetData: prevState.tweetData.concat(data)
                }))
            })

    }
    render() {
        const divStyle = {
            /*Code omitted for brevity */ }
        return (
            <div className="panel panel-default">
                <div className="panel-heading">Simple Twitter</div>
                <div className="panel-body">
                    <form onSubmit={this.handleSubmit}>
                        <input type="hidden" name="ids" onChange={(e)=>this.handleInput('user_id',e)} value="1"/>
                            <div className="form-group">
                                <textarea name="twitterfield" className="form-control" placeholder={'What\'s on your mind...'} rows="3" onChange={(e)=>this.handleInput('tweet',e)}></textarea>
                            </div>
                            <div className="text-right">
                                <input type="submit" className="btn btn-primary" value={'Update'}/>
                            </div>
                    </form>
                </div>
            </div>
        );
    }
}

export default Twitpost;
if (document.getElementById('Twitpost')) {
    ReactDOM.render(<Main />, document.getElementById('Twitpost'));
}
