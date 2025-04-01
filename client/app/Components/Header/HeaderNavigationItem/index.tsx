import {Link} from "react-router";
import "./styles.css";
import React from "react";

interface HeaderNavigationItemProps {
    uri: string,
    active: boolean,
    display: string
}

const Index: React.FC<HeaderNavigationItemProps> = (props) => {
    const {uri, active, display} = props;
    return <li>
        <Link to={uri} className={active ? "active" : ""}>{display}</Link>
    </li>
}

export default Index;