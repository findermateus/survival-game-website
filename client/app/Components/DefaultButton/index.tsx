import React from "react";
import "./styles.css";

interface DefaultButtonProps {
    title: string
}

const DefaultButton: React.FC<DefaultButtonProps> = (props) => {
    const {title} = props;
    return <button className="default-button" type={"button"}>{title}</button>;
}

export default DefaultButton;