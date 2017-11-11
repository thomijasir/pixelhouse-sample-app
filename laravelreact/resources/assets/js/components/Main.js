import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Twitpost from "./Twitpost";

class Main extends Component {

    constructor() {

        super();
        //Initialize the state in the constructor
        this.state = {
            tweetDatas: [],
        }
    }

    componentDidMount() {
        /* fetch API in action */
        fetch('/api/tweet')
            .then(response => {
                return response.json();
            })
            .then(tweetDatas => {
                //Fetched product is stored in the state
                this.setState({ tweetDatas });
            });
    }

    renderTweet() {
        return this.state.tweetDatas.map(tweetData => {
            return (
                // Handle view Fecting data
                <div className="panel-body" onClick={
                    () =>this.handleClick(tweetData)} key={tweetData.id} >
                    <div className="row">
                        <div className="col-xs-2">
                            <img src={'images/'+tweetData.user_id+'.jpg'} className="img-circle center-block pf"/>
                        </div>
                        <div className="col-xs-10">
                            <div className="row">
                                <div className="col-md-12"><b>{ tweetData.name }</b></div>
                            </div>
                            <div className="row">
                                <div className="col-md-12">{ tweetData.tweet }</div>
                            </div>
                            <div className="row">
                                <div className="col-md-12"><i>{ tweetData.updated_at }</i></div>
                            </div>
                        </div>
                    </div>
                </div>

            );
        })
    }

    handleClick(tweetData) {
        //handleClick is used to set the state
        console.log(tweetData.name);
    }
    render() {
        return (
           <div>
               {/*<Twitpost/>*/}
               <div className="panel panel-default">
                   <div className="panel-heading">Your Feed</div>
                       { this.renderTweet() }
               </div>
           </div>
        );
    }
}
export default Main;
if (document.getElementById('contents')) {
    ReactDOM.render(<Main />, document.getElementById('contents'));
}
