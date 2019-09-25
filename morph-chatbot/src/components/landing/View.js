import React, { Component } from 'react';
//components
import ChatApp from "../chat/ChatApp";
import { Button, Form, FormControl, Container } from "react-bootstrap";
// styles
import "../../styles/Navbar.css";
class View extends Component {
  constructor(props) {
    super(props); // set the initial state of the application
    this.state = {
      username: ''
    }; // bind the ‘this’ keyword to the event handlers
    this.usernameChangeHandler = this.usernameChangeHandler.bind(this);
    this.usernameSubmitHandler = this.usernameSubmitHandler.bind(this);
  }
  usernameChangeHandler(event) {
    this.setState({ username: event.target.value });
  }
  usernameSubmitHandler(event) {
    event.preventDefault();
    this.setState({ submitted: true, username: this.state.username });
  }
  render() {
    if (this.state.submitted) {
      // Form was submitted, now show the main App
      return (
        <ChatApp username={this.state.username} />
      );
    }
    return (
    <div className = "View">
    <Container>
      <div className = "p-responsive position-relative">
         <div className="d-md-flex flex-items-center gutter-md-spacious">
             <div className="col-md-7 text-center text-md-left ">
               <h1 className="h000-mktg text-black lh-condensed-ultra mb-3">Your No.1 Dictionary <br /> ChatBot Assistant.</h1>
                 <p className="lead-mktg mb-4"> MorphBot is a development platform inspired by the way you speak.</p>
                   <Form inline onSubmit={this.usernameSubmitHandler}>
                     <FormControl type="text" placeholder="Enter your email address" className="mr-sm-2" type="text" onChange={this.usernameChangeHandler} />
                     <Button variant="outline-success" type="submit" value="submit">Sign Up Free</Button>
                   </Form>
                  </div>
              </div>
          </div>
          </Container>
    </div>
  );
}
}
export default View;
