import React from "react";
import { AppBar, Button, Toolbar, Typography } from "@mui/material";
import "./Navbar.scss";
export default function Navbar() {
    return (
        <div className="navbar_container">
            <AppBar position="static">
                <Toolbar>
                    <Typography variant="h6">
                        <a href="/">Home</a>
                    </Typography>
                    <Button color="inherit">
                        <a href="/login">Login</a>
                    </Button>
                    <Button color="inherit">
                        <a href="/register">Register</a>
                    </Button>
                    <Button color="inherit">
                        <a href="/landing_page">Dashboard</a>
                    </Button>
                </Toolbar>
            </AppBar>
        </div>
    );
}
