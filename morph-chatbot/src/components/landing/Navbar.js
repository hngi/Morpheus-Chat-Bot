import React, { Component } from 'react';

// config

// components
import { Nav, Navbar, Button }from 'react-bootstrap';
// styles
import "../../styles/Navbar.css";



class NavBar extends Component {
  render() {
    return (
      <Navbar bg="bg-transparent navbar-light bg-light" expand="lg">
    <Navbar.Brand href="#home">
      <img
        src="https://res.cloudinary.com/anikefisher/image/upload/v1569379214/logo_ihsqt9.png"
        width="200"
        height="45"
        className="d-inline-block align-top"
        alt=""
      />
    </Navbar.Brand>
    <Navbar.Toggle aria-controls="basic-navbar-nav" />
  <Navbar.Collapse id="basic-navbar-nav">
    <Nav className="mr-auto">
      <Nav.Link href="#home">Home</Nav.Link>
      <Nav.Link href="#features">Features</Nav.Link>
      <Nav.Link href="#help">Help</Nav.Link>
    </Nav>
    <Button>Login</Button>
    <Button>Sign up Free</Button>
  </Navbar.Collapse>
  </Navbar>
    );
  }
}
export default NavBar;
