import React from "react";
import "./styles.css";

interface DefaultButtonProps {
    children: string | React.ReactNode
}

const DefaultButton: React.FC<DefaultButtonProps> = (props) => {
    const {children} = props;
    return <button className="default-button" type={"button"}>{children}</button>;
}

export default DefaultButton;