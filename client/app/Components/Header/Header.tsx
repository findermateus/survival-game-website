import React from "react";
import "./styles.css";
import HeaderNavigationList from "~/Components/Header/HeaderNavigationList";

interface HeaderProps {
    activeOption: "home" | "participate";
}

const Header: React.FC<HeaderProps> = (props) => {
    const {activeOption} = props;
    return <header>
        <HeaderNavigationList activeOption={activeOption} />
    </header>
}

export default Header;