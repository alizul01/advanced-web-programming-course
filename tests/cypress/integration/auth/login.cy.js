/// <reference types="cypress" />

describe("login-test", () => {
    it("login user should be success", () => {
        cy.visit("/login");
        cy.get('input[name="email"]').type("ali@admin.com");
        cy.get('input[name="password"]').type("password");
        cy.get('button[type="submit"]').click();
        cy.url().should("include", "/");
    });
});
